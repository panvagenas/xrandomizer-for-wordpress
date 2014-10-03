<?php
/**
 * User: vagenas
 * Date: 9/15/14
 * Time: 11:30 PM
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @copyright 9/15/14 XDaRk.eu <xdark.eu@gmail.com>
 * @link http://xdark.eu
 */

namespace randomizer\menu_pages\panels {


    use wsc_v000000_dev\menu_pages\panels\panel;

    if (!defined('WPINC')) {
        die;
    }

    /**
     *
     * @package randomizer\menu_pages\panels
     * @author pan.vagenas <pan.vagenas@gmail.com>
     */
    class main_settings extends panel{
        /**
         * @var string Heading/title for this panel.
         * @extenders Should be overridden by class extenders.
         */
        public $heading_title = 'Main settings';

        /**
         * @var string Content/body for this panel.
         * @extenders Should be overridden by class extenders.
         */
        public $content_body = '<h4>Content body</h4>';

        /**
         * @var string Additional documentation for this panel.
         * @extenders Can be overridden by class extenders.
         */
        public $documentation = '';

	    /**
	     * @var array Default options
	     */
	    protected $defaultOptions = array();

	    public function __construct( $instance, $menu_page ) {
		    parent::__construct( $instance, $menu_page );

		    /**
		     * TODO Set default options
		     */
		    $this->defaultOptions = array();// $this->©options->get( 'sets', true );

		    /**
		     * Add the content
		     */
		    $this->content_body .= $this->header();
		    $this->content_body .= $this->main();
		    $this->content_body .= $this->footer();
	    }

	    protected function header(){
		    $out = '';

		    return $out;
	    }

	    protected function main(){
		    $out = '';

		    return $out;
	    }

	    protected function footer(){
		    $out = '';

		    return $out;
	    }
    }
}