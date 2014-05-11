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
    protected $optionsValidations;
    protected $optionsArrayName;
    protected $defaults;
    
    public function __construct() {
        if($this->optionsArrayName){
            $this->options = get_option($this->optionsArrayName);
            $this->defaults = isset(RDefaults::$$this->optionsArrayName) ? RDefaults::$$this->optionsArrayName : null;
            $this->optionsValidations = RDefaults::getValidationTypes($this->optionsArrayName);
        }
    }
    
    public abstract function deleteOption($optName);
    
    public abstract function updateOption($optName, $newValue);
    
    public abstract function updateOptions($newValues);
    
    public abstract function validateOptions($newOptions);

        /**
     * Get the value of an option
     * @param type $optName
     * @return null|mult If option exists returns value, else returns default value, else returns null
     * @since 1.0.0
     */
    public function getValue($optName){
        if ($this->optionExists($optName)) {
            return $this->options[$optName];
        } elseif (isset($this->defaults[$optName])) {
            return $this->defaults[$optName];
        } else {
            return null;
        }
    }
    
    /**
     * Checks if option exists in option array
     * @param type $optName
     * @return bool True if option exists, false otherwise
     * @since 1.0.0
     */
    public function optionExists($optName){
        return isset($this->options[$optName]);
    }
    
    /**
     * Sets options in instance options array.
     * !IMPORTAND! Won't update options in DB, just sets them in instance options array.
     *
     * @param array $options
     *        	New options as associative array
     * @return ROptions
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     * @since 1.0.0
     */
    public function setOptions($options) {
        $this->options = array_merge(isset($this->options) ? (array) $this->options : array(), $options);
        return $this;
    }
    
    /**
     * Getter for optionsArrayName field
     * @return string
     * @since 1.0.0
     */
    public function getOptionsArrayName() {
        return $this->optionsArrayName;
    }
    
    /**
     * Get options array
     *
     * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
     * @return array Options array
     * @since 1.0.0
     */
    public function getOptions() {
        return $this->options;
    }
}
