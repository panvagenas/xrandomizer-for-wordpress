<?php
/**
 * Created by PhpStorm.
 * User: vagenas
 * Date: 11/10/2014
 * Time: 11:23 μμ
 */

namespace randomizer\shortcodes {

	if(!defined('WPINC'))
		exit('Do NOT access this file directly: '.basename(__FILE__));

    class shortcode extends \wsc_v000000_dev\shortcodes\shortcode{
        protected $set;
        protected $content;
        /**
         * Gets default shortcode attributes.
         *
         * @note This should be overwritten by class extenders.
         *
         * @return array Default shortcode attributes.
         */
        public function attr_defaults()
        {
            return array($this->©options->get('sets', true)[0]);
        }

        /**
         * Gets all shortcode attribute keys, interpreted as boolean values.
         *
         * @note This should be overwritten by class extenders.
         *
         * @return array Boolean attribute keys.
         */
        public function boolean_attr_keys()
        {
            return array();
        }

        public function display($attrs){
            if(!isset($attrs['set'])){
                return null;
            }
            $this->initialize($attrs['set']);
            if(empty($this->content)){
                return null;
            }
            echo $this->content;
        }

        public function initialize($setName){
            // TODO Do we need this?
            $this->set = $this->attr_defaults();
            $this->content = $this->©randomizer->getRandomSetMarkUp($this->©options->getSetIdFromSetName($setName));
            return $this;
        }
    }
}