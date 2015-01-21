<?php
/**
 * User: vagenas
 * Date: 9/15/14
 * Time: 11:12 PM
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @copyright 9/15/14 XDaRk.eu <xdark.eu@gmail.com>
 * @link http://xdark.eu
 */

namespace randomizer\menu_pages;


if(!defined('WPINC'))
	exit('Do NOT access this file directly: '.basename(__FILE__));

/**
 * 
 * @package randomizer\menu_pages
 * @author pan.vagenas <pan.vagenas@gmail.com>
 */
class menu_page extends \xd_v141226_dev\menu_pages\menu_page {

    /**
     * @var string Heading/title for this menu page.
     * @extenders Should be overridden by class extenders.
     */
    public $heading_title = '';

    /**
     * @var string Sub-heading/description for this menu page.
     * @extenders Should be overridden by class extenders.
     */
    public $sub_heading_description = '';

    /**
     * @var boolean Should sidebar panels share a global order?
     * @extenders Can be overridden by class extenders.
     */
    public $sidebar_panels_share_global_order = TRUE;

    /**
     * @var boolean Should sidebar panels share a global state?
     * @extenders Can be overridden by class extenders.
     */
    public $sidebar_panels_share_global_state = TRUE;

    /**
     * @var boolean Defaults to FALSE. Does this menu page update options?
     *    When TRUE, each menu page is wrapped with a form tag that calls `©options.®update`.
     *    In addition, `$this->option_fields` will be populated, for easy access to a `©form_fields` instance.
     *    In addition, each menu page will have a `Save All Options` button.
     *
     * @note This comes in handy, when a menu page is dedicated to updating options.
     *    Making it possible for a site owner to update all options (i.e. from all panels), in one shot.
     *    The `Save All Options` button at the bottom will facilitate this.
     *
     * @extenders Can easily be overridden by class extenders.
     */
    public $updates_options = FALSE;

    /**
     * Displays HTML markup for notices, for this menu page.
     *
     * @extenders Can be overridden by class extenders (e.g. by each menu page),
     *    so that custom notices could be displayed in certain cases.
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
     * Displays HTML markup producing sidebar panels for this menu page.
     *
     * @extenders Can be overridden by class extenders (i.e. by each menu page),
     *    so that custom sidebar panels can be displayed by this routine.
     */
    public function display_sidebar_panels()
    {
//        if(!$this->©plugin->has_pro_active())
//            $this->add_sidebar_panel($this->©menu_pages__panels__pro_upgrade($this), TRUE);

	    $this->add_sidebar_panel( $this->©menu_pages__panels__donations( $this ) );
//	    $this->add_sidebar_panel( $this->©menu_pages__panels__other_plugins( $this ) );

        $this->display_sidebar_panels_in_order();
    }

	/**
	 * Displays HTML markup for controls in a menu page header.
	 */
	public function display_header_controls()
	{
        $this->display_header_control__restore_default_options();
        $this->display_header_control__import_export_options();
//        $this->display_header_control__update_theme();
        $this->display_header_control__toggle_all_panels();

        $this->©view->view($this, 'random_set_panel_modal.php', array(), true);
	}
}