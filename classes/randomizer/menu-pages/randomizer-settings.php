<?php
/**
 * User: vagenas
 * Date: 9/14/14
 * Time: 11:11 PM
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @copyright 9/14/14 XDaRk.eu <xdark.eu@gmail.com>
 * @link http://xdark.eu
 */

namespace randomizer {


    use wsc_v000000_dev\menu_pages\menu_page;

    if (!defined('WPINC')) {
        die;
    }

    /**
     *
     * @package randomizer
     * @author pan.vagenas <pan.vagenas@gmail.com>
     */
    class randomizer_settings extends menu_page{

        /**
         * @var string Heading/title for this menu page.
         */
        public $heading_title = '';

        /**
         * @var string Sub-heading/description for this menu page.
         */
        public $sub_heading_description = '';

        /**
         * Constructor.
         *
         * @param object|array $instance Required at all times.
         *    A parent object instance, which contains the parent's ``$instance``,
         *    or a new ``$instance`` array.
         */
        public function __construct($instance)
        {
            $this->updates_options = TRUE;
            parent::__construct($instance);

            $this->heading_title           = $this->__($this->instance->plugin_name . ' Settings');
            $this->sub_heading_description = '';
            $this->content_panels = array();
        }

        /**
         * Displays HTML markup for notices, for this menu page.
         */
        public function display_notices()
        {
        }

        /**
         * Displays HTML markup producing content panels for this menu page.
         *
         * @extenders Should be overridden by class extenders (e.g. by each menu page),
         *    so that custom content panels can be displayed by this routine.
         */
        public function display_content_panels()
        {
            $this->display_content_panels_in_order();
        }

        /**
         * Displays HTML markup producing content panels for this menu page (in order).
         *
         * @extenders Should be called upon by class extenders (e.g. by each menu page),
         *    so that custom content panels can be displayed by this routine.
         */
        public function display_content_panels_in_order()
        {
            $panel_slugs_displayed           = array(); // Initialize.
            $content_panels_in_order_by_slug = $this->get_content_panel_order();

            foreach($content_panels_in_order_by_slug as $_panel_slug)
            {
                if(!in_array($_panel_slug, $panel_slugs_displayed, TRUE))
                    if($this->©string->is_not_empty($this->content_panels[$_panel_slug]))
                    {
                        $panel_slugs_displayed[] = $_panel_slug;
                        echo $this->content_panels[$_panel_slug];
                    }
            }
            unset($_panel_slug); // Housekeeping.

            foreach($this->content_panels as $_panel_slug => $_panel_markup)
            {
                if(!in_array($_panel_slug, $panel_slugs_displayed, TRUE))
                    if($this->©string->is_not_empty($_panel_markup))
                    {
                        $panel_slugs_displayed[] = $_panel_slug;
                        echo $_panel_markup;
                    }
            }
            unset($_panel_slug, $_panel_markup); // Housekeeping.
        }
    }
}