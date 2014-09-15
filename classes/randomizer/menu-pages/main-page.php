<?php
/**
 * Menu Page.
 *
 * Copyright: © 2012 (coded in the USA)
 * {@link http://www.websharks-inc.com WebSharks™}
 *
 * @author JasWSInc
 * @package WebSharks\Core
 * @since 140523
 */
namespace randomizer\menu_pages
{
    use wsc_v000000_dev\menu_pages\menu_page;

    if(!defined('WPINC'))
		exit('Do NOT access this file directly: '.basename(__FILE__));

	/**
	 * Menu Page.
	 *
	 * @package WebSharks\Core
	 * @since 140914
	 *
	 * @assert ($GLOBALS[__NAMESPACE__])
	 */
	class main_page extends menu_page
	{
        public $updates_options = true;
		/**
		 * Constructor.
		 *
		 * @param object|array $instance Required at all times.
		 *    A parent object instance, which contains the parent's ``$instance``,
		 *    or a new ``$instance`` array.
		 */
		public function __construct($instance)
		{
			parent::__construct($instance);

			$this->heading_title           = $this->__('Main settings');
			$this->sub_heading_description = sprintf($this->__('%1$s main settings '), esc_html($this->instance->plugin_name));
		}

		/**
		 * Displays HTML markup producing content panels for this menu page.
		 */
		public function display_content_panels()
		{
			$this->add_content_panel($this->©menu_pages__panels__main_settings($this), TRUE);
            $this->display_content_panels_in_order();
		}

        /**
         * Displays HTML markup producing sidebar panels for this menu page.
         *
         * @extenders Can be overridden by class extenders (i.e. by each menu page),
         *    so that custom sidebar panels can be displayed by this routine.
         */
        public function display_sidebar_panels()
        {
            $this->add_sidebar_panel($this->©menu_pages__panels__donations($this));
            $this->display_sidebar_panels_in_order();
        }

        /**
         * Displays HTML markup for notices, for this menu page.
         *
         */
        public function display_notices()
        {
        }
	}
}