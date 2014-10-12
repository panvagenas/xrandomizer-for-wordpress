<?php
/**
 * User: vagenas
 * Date: 20/9/2014
 * Time: 2:42 πμ
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @copyright 20/9/2014 XDaRk.eu <xdark.eu@gmail.com>
 * @link http://xdark.eu
 */

namespace randomizer {

	if(!defined('WPINC'))
		exit('Do NOT access this file directly: '.basename(__FILE__));

	/**
	 *
	 * @package randomizer
	 * @author pan.vagenas <pan.vagenas@gmail.com>
	 */
	class views extends framework {

		public function view(&$callee, $file, Array $viewData = null, $echo = false ) {
			( $viewData ) ? extract( $viewData ) : null;


			ob_start();
			require $this->©dirs_files->view( $file );
			$content = ob_get_clean();
			if ( ! $echo ) {
				return $content;
			}
			echo $content;
		}
	}
}