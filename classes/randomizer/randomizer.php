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
            $css = $this->©options->get('custom_css');
            $out = '';
            foreach ($randomized as $element) {
                $out .= $before . $element['content'] . $after;
            }

            // TODO This shouldn't be here, it includes style everytime
            if (!empty($css)) {
                $out .= '<style type="text/css" class="rz-apply-inline">' . $css . '</style>';
            }

			return $out;
		}

        protected function init($setId)
        {
            $this->setId = $setId;
            $this->isDefault = true;
            $sets = $this->©options->get('sets');
            $set = $this->©options->get('sets', true)[0];
            foreach ($sets as $s) {
                if ($s['id'] === $this->setId) {
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
        protected function randomizeArray()
        {
            $isCyclic = $this->setOptions['randomPolicy'] == 'cyclic';
            // Remove disabled elements all the times and before any other action
            $this->removeDisabled();
            $pined = $this->countGetAndRemovePined();

            if ($isCyclic) {
                $cookieName = 'rzCyclicIndex' . $this->setOptions['id'];
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