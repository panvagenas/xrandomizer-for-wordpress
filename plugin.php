<?php
/**
 * User: vagenas
 * Date: 9/14/14
 * Time: 10:41 PM
 *
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @copyright 9/14/14 XDaRk.eu <xdark.eu@gmail.com>
 * @link http://xdark.eu
 */


/* -- WordPress® --------------------------------------------------------------------------------------------------------------------------

Version: 150120
Stable tag: 140914
Tested up to: 4.1
Requires at least: 3.5.1

Requires at least Apache version: 2.1
Tested up to Apache version: 2.4.7

Requires at least PHP version: 5.3.1
Tested up to PHP version: 5.5.12

Copyright: © 2014 XDaRk.eu
License: GNU General Public License V3 or later
Contributors: XDaRk.eu

Author: Panagiotis Vagenas <pan.vagenas@gmail.com>
Author URI: http://erp.xdark.eu

Text Domain: randomizer
Domain Path: /translations

Plugin Name: XRandomizer
Plugin URI: http://erp.xdark.eu

Description: Display content through a widget or shortcode
Kudos: WebSharks™ http://www.websharks-inc.com
Tags: ad,ad rotators,ads,advert,advertise,advertisement,advertiser,advertising,advert manager,adverts,banner,banner manager,commercial,content,custom ads,custom banners,custom rotating banners,export,image ads,image widget,plugin,random,random banners,random rotating banners,rotate,rotating banners,rotator,sidebar,widget,widget ads
-- end section for WordPress®. --------------------------------------------------------------------------------------------------------- */

namespace randomizer {

	if(!defined('WPINC'))
		exit('Do NOT access this file directly: '.basename(__FILE__));

    /* ----------------------------------------------------------------------------*
     * Session functionality
     * ---------------------------------------------------------------------------- */
    if (!defined('WP_SESSION_COOKIE')) {
        define('WP_SESSION_COOKIE', 'wp_session');
    }

    if (!class_exists('Recursive_ArrayAccess')) {
        require_once ( plugin_dir_path(__FILE__) . 'includes/session_manager/class-recursive-arrayaccess.php' );
    }

    // Only include the functionality if it's not pre-defined.
    if (!class_exists('WP_Session')) {
        require_once ( plugin_dir_path(__FILE__) . 'includes/session_manager/class-wp-session.php' );
        require_once ( plugin_dir_path(__FILE__) . 'includes/session_manager/wp-session.php' );
    }

    // Start plugin
    require_once dirname(__FILE__) . '/classes/randomizer/framework.php';
}