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
    private static $mainOptions = array();
    private static $widOptions = array();
    private static $shortCodeOptions = array();
    
    public static function getMainOptions() {
        return self::$mainOptions;
    }

    public static function getWidOptions() {
        return self::$widOptions;
    }

    public static function getShortCodeOptions() {
        return self::$shortCodeOptions;
    }
}
