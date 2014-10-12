<?php
/**
 * User: vagenas
 * Date: 20/9/2014
 * Time: 2:49 πμ
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @copyright 20/9/2014 XDaRk.eu <xdark.eu@gmail.com>
 * @link http://xdark.eu
 */

namespace randomizer;

if(!defined('WPINC'))
	exit('Do NOT access this file directly: '.basename(__FILE__));

class dirs extends \wsc_v000000_dev\dirs{

	public function where_views_may_reside(){

		$dirs = array(
			$this->n_seps(get_stylesheet_directory()).'/'.$this->instance->plugin_root_ns_stub_with_dashes . '/view',
			$this->n_seps(get_template_directory()).'/'.$this->instance->plugin_root_ns_stub_with_dashes . '/view',

			$this->instance->plugin_pro_dir.'/view/'.$this->instance->plugin_root_ns_stub_with_dashes,
			$this->instance->plugin_dir.'/view/'.$this->instance->plugin_root_ns_stub_with_dashes,

			$this->instance->plugin_pro_dir.'/view', // Extends core; NOT intended for further customization.
			$this->instance->plugin_dir.'/view', // Extends core; NOT intended for further customization.
		);

		return $this->apply_filters(__FUNCTION__, $dirs);
	}
} 