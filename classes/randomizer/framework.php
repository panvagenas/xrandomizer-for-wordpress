<?php
/**
 * User: vagenas
 * Date: 9/14/14
 * Time: 10:43 PM
 *
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @copyright 9/14/14 XDaRk.eu <xdark.eu@gmail.com>
 * @link http://xdark.eu
 */


namespace randomizer {

    if (!defined('WPINC')) {
        die;
    }

    require_once dirname(dirname(dirname(__FILE__))).'/core/stub.php';

    class framework extends \wsc__framework
    {
        /**
         * var string Plugin slug
         */
        protected $plugin_slug;

        public function __construct($instance){
            parent::__construct($instance);
            $this->plugin_slug = $this->instance->plugin_root_ns_stub_with_dashes;
        }
    }

    $GLOBALS[__NAMESPACE__] = new framework(
        array(
            'plugin_root_ns' => __NAMESPACE__, // The root namespace
            'plugin_var_ns'  => 'rz', // A shorter namespace alias (or the same as `plugin_root_ns` if you like).
            'plugin_cap'     => 'manage_options', // The WordPress capability (or role) required to manage plugin options.
            'plugin_name'    => 'Randomizer', //
            'plugin_version' => '140914', // The current version of plugin (must be in `YYMMDD` format).
            'plugin_site'    => 'http://xdark.eu', // TODO URL to site about your plugin.

            'plugin_dir'     => dirname(dirname(dirname(__FILE__))) // Your plugin directory.

        )
    );
}