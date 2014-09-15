<?php
/**
 * User: vagenas
 * Date: 9/14/14
 * Time: 11:11 PM
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @copyright 9/14/14 XDaRk.eu <xdark.eu@gmail.com>
 * @link http://xdark.eu
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
	class banner_sets extends menu_page
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
			parent::__construct($instance);

			$this->heading_title           = $this->__('Quick-Start Guide');
			$this->sub_heading_description = sprintf($this->__('Quick overview &amp; a few tips regarding %1$s'),
			                                         esc_html($this->instance->plugin_name));
		}

		/**
		 * Displays HTML markup producing content panels for this menu page.
		 */
		public function display_content_panels()
		{
			$this->add_content_panel($this->©menu_pages__panels__quick_start_video($this), TRUE);

			parent::display_content_panels();
		}
	}
}