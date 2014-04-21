<?php

/**
 * Plugin Name.
 *
 * @package   Plugin_widget
 * @author    Your Name <email@example.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2014 Your Name or Company Name
 */

/**
 * Plugin class. This class should ideally be used to work with your
 * plugin widget.
 *
 * @TODO: Rename this class to a proper name for your plugin.
 *
 * @package Plugin_widget
 * @author  Your Name <email@example.com>
 */
class Plugin_widget {

    public function __construct() {
	parent::__construct(
		'', // @TODO Slug
		'', // @TODO Name
		array(
	    'description' => __('  ') /* @TODO Description */
		), array(
		// @TODO Widget options
	));
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args
     *        	Widget arguments.
     * @param array $instance
     *        	Saved values from database.
     * @since 1.0.0
     * @author Vagenas Panagiotis <pan.vagenas@gmail.com>
     */
    public function widget($args, $instance) {
	
    }

    /**
     * Back-end widget form.
     * Outputs the options form on admin
     *
     * @see WP_Widget::form()
     *
     * @param array $instance
     *        	Previously saved values from database.
     * @since 1.0
     * @author Vagenas Panagiotis <pan.vagenas@gmail.com>
     */
    public function form($instance) {
	
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance
     *        	Values just sent to be saved.
     * @param array $old_instance
     *        	Previously saved values from database.
     * @return array Updated safe values to be saved.
     * @since 1.0.0
     * @author Vagenas Panagiotis <pan.vagenas@gmail.com>
     */
    public function update($new_instance, $old_instance) {
	
    }

}
