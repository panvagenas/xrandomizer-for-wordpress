<?php
/**
 * User: vagenas
 * Date: 9/11/14
 * Time: 10:20 PM
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @copyright 9/11/14 XDaRk.eu <xdark.eu@gmail.com>
 * @link http://xdark.eu
 */

namespace randomizer;

if (!defined('WPINC')) {
    die;
}

/**
 *
 * @package randomizer
 * @author pan.vagenas <pan.vagenas@gmail.com>
 */
class widget extends \WP_Widget
{
    /**
     * @var string Slug for this widget.
     * @note Set to the basename of the class w/ dashes.
     */
    public $slug = 'randomizer';

    /**
     * @var string Name for this widget.
     * @note Set to the name of the widget w/ dashes.
     */
    public $name = 'Randomizer Widget';

    /**
     * @var array Options for this widget.
     * @note Set options for this widget.
     */
    public $options = array( 'description' => 'Randomizer Widget Description' ); // TODO Widget description

    /**
     * @var array Options for this widget.
     * @note Set options for this widget. Currently only width is supported.
     */
    public $controlOptions = array(  );

    /**
     * Plugin framework
     * @var framework
     */
    protected $framework;

    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        
        global $randomizer;
        $this->framework = $randomizer;
        
        $this->options['description'] = $this->framework->__($this->options['description']);
        
        parent::__construct(
                $this->framework->__($this->slug), 
                $this->framework->__($this->name), 
                $this->options, 
                $this->controlOptions
                );

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
     * @since 140901
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     */
    public function widget($args, $instance) {

    }

    /**
     * Back-end widget form.
     * Outputs the options form on admin
     *
     * @see \WP_Widget::form()
     *
     * @param array $instance
     *            Previously saved values from database.
     * @return string|void
     * @since 140901
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
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
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     */
    public function update($new_instance, $old_instance) {

    }
} 