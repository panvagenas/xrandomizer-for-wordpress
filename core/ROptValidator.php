<?php

/**
 * ROptValidator.php
 *
 * @package   @todo
 * @author    Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @link      @todo
 * @copyright 2014 Panagiotis Vagenas <pan.vagenas@gmail.com>
 */

/**
 * Description of ROptValidator
 * 
 * @package @todo
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 */
class ROptValidator {

    /**
     * Instance of this class.
     *
     * @since    1.0.0
     *
     * @var      ROptValidator
     */
    protected static $instance = null;

    /**
     * Initialize the plugin by setting localization and loading public scripts
     * and styles.
     *
     * @since     1.0.0
     */
    private function __construct() {
        
    }

    /**
     * Return an instance of this class.
     *
     * @since     1.0.0
     *
     * @return    ROptValidator    A single instance of this class.
     */
    public static function get_instance() {

        // If the single instance hasn't been set, set it now.
        if (null == self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function string($input, $stripTags){
        return filter_var($input, $stripTags ? FILTER_SANITIZE_STRING : FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
    public function url($input, $local = true) {
        $filtered = filter_var($input, FILTER_SANITIZE_URL);
        if($local){
            $s = preg_replace('(https?://)', '', $value);
            $u = preg_replace('(https?://)', '', get_site_url());
            if (strpos($s, $u) === false) {
                return null;
            }
        } 
        return $filtered;
    }
    
    public function bool($input) {
        return filter_var($input, FILTER_VALIDATE_BOOLEAN);
    }
    
    public function ar($input) {
        // TODO
    }
    
    public function float($input) {
        return filter_var($input, FILTER_VALIDATE_FLOAT);
    }
    
    public function int($input) {
        return filter_var($input, FILTER_VALIDATE_INT);
    }
}
