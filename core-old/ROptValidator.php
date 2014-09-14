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
    const int = 'int';
    const float = 'float';
    const string = 'string';
    const arr = 'array';
    const bool = 'bool';
    const url = 'url';

    public function string($input, $stripTags = true){
        return filter_var($input, $stripTags ? FILTER_SANITIZE_STRING : FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
    public static function url($input, $local = true) {
        $filtered = filter_var($input, FILTER_SANITIZE_URL);
        if($local){
            $s = preg_replace('(https?://)', '', $value);
            $u = preg_replace('(https?://)', '', get_site_url());
            if (strpos($s, $u) === false) {
                return false;
            }
        } 
        return $filtered;
    }
    
    public static function bool($input) {
        return filter_var($input, FILTER_VALIDATE_BOOLEAN);
    }
    
    public static function arr($input, $specialExplodeChar = null) {
        if(is_string($input)){
            if(!empty($specialExplodeChar)){
                $exploded = explode($specialExplodeChar, $input);
                return is_array($exploded) ? $exploded : FALSE;
            }
            $userial = unserialize($input);
            if(is_array($userial)){
                return $userial;
            }
        }
        return is_array($input) ? $input : FALSE;
    }
    
    public static function float($input) {
        return filter_var($input, FILTER_VALIDATE_FLOAT);
    }
    
    public static function int($input) {
        return filter_var($input, FILTER_VALIDATE_INT);
    }
}
