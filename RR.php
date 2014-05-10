<?php

/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that
 * also follow WordPress Coding Standards and PHP best practices.
 *
 * @package   RRandomizer
 * @author    Your Name <email@example.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2014 Your Name or Company Name
 *
 * @wordpress-plugin
 * Plugin Name:       RRandomizer
 * Plugin URI:        @TODO
 * Description:       @TODO
 * Version:           1.0.0
 * Author:            Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Author URI:        @TODO
 * Text Domain:       rrandomizer-en_us
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!defined('RRANDOMIZER_BASE_PATH')) {
    define('RRANDOMIZER_BASE_PATH', plugin_dir_path(__FILE__));
}
if (!defined('RRANDOMIZER_BASE_URL')) {
    define('RRANDOMIZER_BASE_URL', plugin_dir_url(__FILE__));
}
if (!defined('RRANDOMIZER_MAIN_OPTS_ARRAY_NAME')) {
    define('RRANDOMIZER_MAIN_OPTS_ARRAY_NAME', 'RandomizerMainOptions');
}

/* ----------------------------------------------------------------------------*
 * Core classes
 * ---------------------------------------------------------------------------- */
require_once( plugin_dir_path(__FILE__) . 'core/RPaths.php' );
RPaths::requireOnce(RPaths::$RDefaults);

/* ----------------------------------------------------------------------------*
 * Public-Facing Functionality
 * ---------------------------------------------------------------------------- */

RPaths::requireOnce(RPaths::$RRandomizer);

RPaths::requireOnce(RPaths::$RRandomizer_widget);

/*
 * @TODO:
 *
 * - replace Plugin_Name with the name of the class defined in
 *   `class-plugin-name.php`
 */
add_action('plugins_loaded', array('RRandomizer', 'get_instance'));
/*
 * @TODO:
 *
 * - replace Plugin_widget with the name of the class defined in
 *   `class-plugin-widget.php`
 */
add_action('widgets_init', function () {
    register_widget('RRandomizer_widget');
});

/* ----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 * ---------------------------------------------------------------------------- */

/*
 * @TODO:
 *
 * - replace `class-plugin-name-admin.php` with the name of the plugin's admin file
 * - replace Plugin_Name_Admin with the name of the class defined in
 *   `class-plugin-name-admin.php`
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if (is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX )) {

    RPaths::requireOnce(RPaths::$RRandomizerAdmin);
    
    add_action('plugins_loaded', array('RRandomizerAdmin', 'get_instance'));


    /*
     * Register hooks that are fired when the plugin is activated or deactivated.
     * When the plugin is deleted, the uninstall.php file is loaded.
     *
     * @TODO:
     *
     * - replace Plugin_Name with the name of the class defined in
     *   `class-plugin-name.php`
     */
    register_activation_hook(__FILE__, array('RRandomizerAdmin', 'activate'));
    register_deactivation_hook(__FILE__, array('RRandomizerAdmin', 'deactivate'));
}

/**
 * Shortcode function
 *
 * @param array $attrs
 * @return string
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @since 1.0.0
 */
function RRandomizerShortcode($attrs) {

    // If no profile is set return empty string
    if (!isset($attrs['profile'])) {
        return '';
    }

    global $post;
    if($post == null){
        return '';
    }
    RPaths::requireOnce(RPaths::$RShortCode);
//TODO
//    $sc = new erpPROShortcode($attrs['profile']);
//    return $sc->display($post->ID);
}

add_shortcode('randomizer', 'RRandomizerShortcode');
