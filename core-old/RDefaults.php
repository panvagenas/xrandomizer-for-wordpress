<?php

/**
 * RDefaults.php
 *
 * @package   @todo
 * @author    Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @link      @todo
 * @copyright 2014 Panagiotis Vagenas <pan.vagenas@gmail.com>
 */

/**
 * Description of RDefaults
 * 
 * @package @todo
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 */
class RDefaults {

    const int = 'int';
    const float = 'float';
    const string = 'string';
    const arr = 'array';
    const bool = 'bool';
    const url = 'url';

    /**
     * Main plugin options
     * @var array 
     */
    public static $RandomizerMainOptions = array(
    );

    /**
     * Main plugin options validations
     * @var array 
     */
    public static $RandomizerMainOptionsValidations = array(
    );

    /**
     * Profile options
     * @var array 
     */
    public static $RandomizerProfileOptions = array(
        'title' => 'Randomizer',
        'borderWeigth' => 0,
        'borderColor' => '#ffffff',
        'borderRadius' => 0,
        'content' => array()
    );

    /**
     * Profile options validations
     * @var array 
     */
    public static $RandomizerProfileOptionsValidations = array(
        'title' => array('type' => self::string, 'strip' => true),
        'borderWeigth' => array('type' => self::int, 'min' => 0),
        'borderColor' => array('type' => self::string, 'strip' => true),
        'borderRadius' => array('type' => self::int, 'min' => 0),
        'content' => array('type' => self::arr)
    );

    /**
     * Widget options
     * @var array 
     */
    public static $widget_rrandomizer = array(
        'exCategories' => array(),
        'exTags' => array(),
        'exPostTypes' => array()
    );

    /**
     * Widget options validations
     * @var array 
     */
    public static $widget_rrandomizerValidations = array(
        'exCategories' => array('type' => self::arr),
        'exTags' => array('type' => self::arr),
        'exPostTypes' => array('type' => self::arr)
    );

    /**
     * Shortcode options
     * @var array 
     */
    public static $RandomizerShortCodeOptions = array(
    );

    /**
     * Shortcode options validations
     * @var array 
     */
    public static $RandomizerShortCodeOptionsValidations = array(
    );

    public static function getValidationTypes($optionArrayName) {
        $vars = get_class_vars(__CLASS__);
        return isset($vars[$optionArrayName . 'Validations']) ? $vars[$optionArrayName . 'Validations'] : null;
    }

}
