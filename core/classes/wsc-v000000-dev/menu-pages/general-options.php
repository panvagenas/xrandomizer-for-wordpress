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
namespace wsc_v000000_dev\menu_pages
{
	if(!defined('WPINC'))
		exit('Do NOT access this file directly: '.basename(__FILE__));

	/**
	 * Menu Page.
	 *
	 * @package WebSharks\Core
	 * @since 140523
	 *
	 * @assert ($GLOBALS[__NAMESPACE__])
	 */
	class general_options extends menu_page
	{
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

			$this->heading_title           = $this->__('General Options');
			$this->sub_heading_description = sprintf($this->__('%1$s general configuration options.'),
			                                         esc_html($this->instance->plugin_name));
		}

		/**
		 * Displays HTML markup producing content panels for this menu page.
		 */
		public function display_content_panels()
		{
			parent::display_content_panels();
		}
	}
}