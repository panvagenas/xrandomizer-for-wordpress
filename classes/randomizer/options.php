<?php
/**
 * User: vagenas
 * Date: 9/15/14
 * Time: 10:47 PM
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @copyright 9/15/14 XDaRk.eu <xdark.eu@gmail.com>
 * @link http://xdark.eu
 */

namespace randomizer {


    if (!defined('WPINC')) {
        die;
    }

    /**
     *
     * @package randomizer
     * @author pan.vagenas <pan.vagenas@gmail.com>
     */
    class options extends \wsc_v000000_dev\options{

        /**
         * Sets up default options and validators.
         *
         * @extenders Can be overridden by class extenders (i.e. to override the defaults/validators);
         *    or to add additional default options and their associated validators.
         *
         * @param array $defaults An associative array of default options.
         * @param array $validators An array of validators (can be a combination of numeric/associative keys).
         *
         * @return array The current array of options.
         *
         * @throws exception If invalid types are passed through arguments list.
         * @throws exception If `count($defaults) !== count($validators)`.
         */
        public function setup($defaults, $validators)
        {
            // TODO Set defaults
            $randomizerDefaults   = array(
                'encryption.key'                             => 'jkiabOKBNJO89347KJBKJBasfd',

                'support.url'                                => 'xdark.eu/support',

                'styles.front_side.theme'                    => 'yeti',

                'crons.config'                               => array(),

                'menu_pages.theme'                           => 'yeti',

                'captchas.google.public_key'                 => '6LeCANsSAAAAAIIrlB3FrXe42mr0OSSZpT0pkpFK',
                'captchas.google.private_key'                => '6LeCANsSAAAAAGBXMIKAirv6G4PmaGa-ORxdD-oZ',

                'url_shortener.default_built_in_api'         => 'goo_gl',
                'url_shortener.custom_url_api'               => '',
                'url_shortener.api_keys.goo_gl'              => '',

                'menu_pages.panels.email_updates.action_url' => '',
                'menu_pages.panels.community_forum.feed_url' => '',
                'menu_pages.panels.news_kb.feed_url'         => '',
                'menu_pages.panels.videos.yt_playlist'       => '',

                'banner.sets'                               => array(),
            );

            $randomizerDefaultsValidators = array(
                'banner.sets'              => array('array'),
            );

            $defaults = array_merge($defaults, $randomizerDefaults);
            $validators = array_merge($validators, $randomizerDefaultsValidators);

            $this->_setup($defaults, $validators);
        }


    }
}