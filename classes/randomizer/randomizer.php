<?php
/**
 * Created by PhpStorm.
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 4/10/2014
 * Time: 8:56 μμ
 */

namespace randomizer {


	use WP_Query;

	class randomizer extends framework{
		/**
		 *
		 * @var array
		 */
		protected $original = array();
		/**
		 *
		 * @var array
		 */
		protected $randomized = array();

		protected $setOptions = array();

		protected $isDefault = true;

		protected $setId = 'default';

		public function getRandomSetMarkUp($setId){
			$this->setId = $setId;
			$this->init();

			$randomized = $this->randomizeArray();
			$before = $this->©options->get('before_element');
			$after = $this->©options->get('after_element');
			$css = $this->©options->get('custom_css');
			$out = '';
			foreach ( $randomized as $element ) {
				$out .= $before . $element . $after;
			}

			if(!empty($css)){
				$out .= '<style type="text/css">' . $css . '</style>';
			}

			return $out;
		}

		protected function init(){
			$this->isDefault = true;
			$sets = $this->©options->get('sets');
			$set = $this->©options->get('sets', true)[0];
			foreach($sets as $s){
				if($s['id'] === $this->setId){
					$set = $s;
					$this->isDefault = false;
					break;
				}
			}
			$this->randomized = $this->original = &$set['elements'];
			$this->setOptions = &$set;
			$this->setOptions = $this->setOptions + $this->©options->get('sets', true)[0];
			return $this->isDefault;
		}

		/**
		 *
		 * @return array
		 */
		protected function randomizeArray() {
			$isCyclic = $this->setOptions['randomPolicy'] == 'cyclic';

			if($isCyclic){
                $cookieName = 'rzCyclicIndex'.$this->setOptions['id'];
                $cookie = \WP_Session::get_instance();

                $index = isset($cookie[$cookieName]) && !empty($cookie[$cookieName]) ? (int)$cookie[$cookieName] : 0;

                $index %= count($this->setOptions['elements']);

                $cookie[$cookieName] = $index+1;

                while($index-- >= 0){
                    array_push($this->randomized, array_shift($this->randomized));
                }
			} else {
				$this->randomized = shuffle($this->randomized) ? $this->randomized : $this->original;
			}
            return array_slice($this->randomized, 0, $this->setOptions['numOfElmsToDspl'] > 0 ? $this->setOptions['numOfElmsToDspl'] : null);
		}

		/**
		 * @param \WP_Query $wpQuery
		 *
		 * @return \WP_Query
		 */
		protected function randomizeWP_Query(WP_Query $wpQuery){
			if(!isset($wpQuery->posts)){
				return $wpQuery;
			}
			$wpQuery->posts = $this->randomizeArray($wpQuery->posts);
			return $wpQuery;
		}
	}
}