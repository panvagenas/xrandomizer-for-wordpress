<?php
/**
 * Created by PhpStorm.
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 4/10/2014
 * Time: 8:56 μμ
 */

namespace randomizer {

	if(!defined('WPINC'))
		exit('Do NOT access this file directly: '.basename(__FILE__));

    use WP_Query;
    use xd_v141226_dev\arrays;

    class randomizer extends framework
    {
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

        protected $pinedCount = 0;

        public function getRandomSetMarkUp($setId)
        {
            $this->init($setId);

            $randomized = $this->randomizeArray();
            $before = $this->©options->get('before_element');
            $after = $this->©options->get('after_element');
            $out = '';
            foreach ($randomized as $element) {
                if(!isset($element['mode']) || !method_exists($this, $element['mode'])) continue;

                $out .= $before . $this->{$element['mode']}($element) . $after;
            }

			return $out;
		}

        protected function php($element){
            ob_start();
            eval($element['content']);
            return ob_get_clean();
        }

        protected function html($element){
            return $element['content'];
        }

        protected function javascript($element){
            return '<script type="text/javascript">' . $element['content'] . '</script>';
        }

        protected function text($element){
            return $element['content'];
        }

        protected function markdown($element){
            // TODO Implement
            return $element['content'];
        }

        protected function init($setId)
        {
            $this->setId = $setId;
            $this->isDefault = true;
            $sets = $this->©options->get('sets');
            $set = $sets[0];
            foreach ($sets as $s) {
                if ($s['id'] === $this->setId) {
                    $set = $s;
                    $this->isDefault = false;
                    break;
                }
            }
            $this->randomized = $this->original = &$set['elements'];
            $this->setOptions = &$set;
            $defSets = $this->©options->get('sets', true);
            $this->setOptions = $this->setOptions + $defSets[0];
            return $this->isDefault;
        }

        /**
         *
         * @return array
         */
        protected function randomizeArray()
        {
            $rotateThem = $this->setOptions['randomPolicy'] == 'rotate';
            // Remove disabled elements all the times and before any other action
            $this->removeDisabled();
            $pined = $this->countGetAndRemovePined();

            if ($rotateThem) {
                $cookieName = 'rzRotateIndex' . $this->setOptions['id'];
                $cookie = \WP_Session::get_instance();

                $index = isset($cookie[$cookieName]) && !empty($cookie[$cookieName]) ? (int)$cookie[$cookieName] : 0;

                $index %= count($this->setOptions['elements']) - $this->pinedCount;

                $cookie[$cookieName] = $index + 1;

                while ($index-- > 0) {
                    array_push($this->randomized, array_shift($this->randomized));
                }
            } else {
                $this->randomized = shuffle($this->randomized) ? $this->randomized : $this->original;
            }

            foreach ($pined as $k => $element) {
                if (empty($pined[$k])) {
                    $pined[$k] = array_shift($this->randomized);
                }
            }

            $this->randomized = $pined;

            return $this->getSliced();
        }


        protected function countGetAndRemovePined()
        {
            $a = array();
            $c = 0;
            foreach ($this->randomized as $k => $element) {
                if ($element['pined']) {
                    // if pined add the element to array
                    array_push($a, $element);
                    unset($this->randomized[$k]);
                    $c++;
                } else {
                    // else push an empty array, this indicates a place for non pined elements
                    array_push($a, array());
                }
            }

            $this->pinedCount = $c;
            return $a;
        }

        protected function removeDisabled()
        {
            foreach ($this->randomized as $k => $element) {
                if ($element['disabled']) unset($this->randomized[$k]);
            }
            return $this;
        }

        protected function getSliced()
        {
            return array_slice($this->randomized, 0, $this->setOptions['numOfElmsToDspl'] > 0 ? $this->setOptions['numOfElmsToDspl'] : null);
        }

        /**
         * @param \WP_Query $wpQuery
         *
         * @return \WP_Query
         */
        protected function randomizeWP_Query(WP_Query $wpQuery)
        {
            if (!isset($wpQuery->posts)) {
                return $wpQuery;
            }
            $wpQuery->posts = $this->randomizeArray($wpQuery->posts);
            return $wpQuery;
        }
    }
}