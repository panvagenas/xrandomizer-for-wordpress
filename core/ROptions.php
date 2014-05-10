<?php

/**
 * ROptions.php
 *
 * @package   @todo
 * @author    Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @link      @todo
 * @copyright 2014 Panagiotis Vagenas <pan.vagenas@gmail.com>
 */

/**
 * Description of ROptions
 * 
 * @package @todo
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 */
abstract class ROptions {
    protected $options = array();
    protected $optionsArrayName;
    protected $defaults;
    
    public function getValue($optName){
        if ($this->optionExists($optName)) {
            return $this->options[$optName];
        } elseif (isset($this->defaults[$optName])) {
            return $this->defaults[$optName];
        } else {
            return null;
        }
    }
    
    public function optionExists($optName){
        return isset($this->options[$optName]);
    }
    
    public abstract function deleteOption($optName);
    
    public abstract function updateOption($optName, $newValue);
    
    public abstract function updateOptions($newValues);
}
