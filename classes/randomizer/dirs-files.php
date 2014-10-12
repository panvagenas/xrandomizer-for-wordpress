<?php
/**
 * User: vagenas
 * Date: 20/9/2014
 * Time: 3:17 πμ
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @copyright 20/9/2014 XDaRk.eu <xdark.eu@gmail.com>
 * @link http://xdark.eu
 */

namespace randomizer {

	if(!defined('WPINC'))
		exit('Do NOT access this file directly: '.basename(__FILE__));

	class dirs_files extends \wsc_v000000_dev\dirs_files{

		/**
		 * Locates a view directory/file (relative path).
		 *
		 * @param string  $dir_file Template directory/file name (relative path).
		 *
		 * @param boolean $allow_failure Optional. Defaults to a `FALSE` value.
		 *    By default, if the template dir/file does NOT exist, an exception is thrown.
		 *    If `TRUE`, an empty string is returned on failure; instead of throwing an exception.
		 *
		 * @return string Absolute path to a template directory/file (w/ the highest precedence).
		 *
		 * @throws \wsc_v000000_dev\exception If invalid types are passed through arguments list.
		 * @throws \wsc_v000000_dev\exception If `$dir_file` is empty (it MUST be passed as a string, NOT empty).
		 * @throws \wsc_v000000_dev\exception If `$dir_file` does NOT exist, or is NOT readable.
		 */
		public function view($dir_file, $allow_failure = FALSE)
		{
			$this->check_arg_types('string:!empty', 'boolean', func_get_args());

			$dir_file = ltrim($this->n_seps($dir_file), '/');

			foreach(($dirs = $this->©dirs->where_views_may_reside()) as $_dir)
				if(file_exists($path = $_dir.'/'.$dir_file) && is_readable($path))
					return $path; // Absolute directory/file path.
			unset($_dir); // Housekeeping.

			if($allow_failure) return '';

			throw $this->©exception(
				$this->method(__FUNCTION__).'#dir_file_missing', get_defined_vars(),
				sprintf($this->__('Unable to locate template directory/file: `%1$s`.'), $dir_file)
			);
		}


}}