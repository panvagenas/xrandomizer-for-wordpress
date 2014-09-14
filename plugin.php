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

Version: 140914
Stable tag: 140914
Tested up to: 4.0
Requires at least: 3.5.1

Requires at least Apache version: 2.1
Tested up to Apache version: 2.4.7

Requires at least PHP version: 5.3.1
Tested up to PHP version: 5.5.12

Copyright: © 2014 XDaRk.eu
License: GNU General Public License TODO
Contributors: XDaRk.eu

Author: Panagiotis Vagenas <pan.vagenas@gmail.com>
Author URI: http://xdark.eu

Text Domain: randomizer
Domain Path: /translations

Plugin Name: Randomizer
Plugin URI: http://xdark.eu TODO

Description: XDaRk.eu Core framework for WordPress® plugin development.
Tags: TODO
Kudos: WebSharks™ http://www.websharks-inc.com

-- end section for WordPress®. --------------------------------------------------------------------------------------------------------- */

namespace randomizer {

    if (!defined('WPINC')) {
        die;
    }

    require_once dirname(__FILE__) . '/classes/randomizer/framework.php';
}