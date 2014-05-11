<?php

/**
 * RWidgetOptions.php
 *
 * @package   @todo
 * @author    Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @link      @todo
 * @copyright 2014 Panagiotis Vagenas <pan.vagenas@gmail.com>
 */

/**
 * Description of RWidgetOptions
 * 
 * @package @todo
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 */
class RWidgetOptions extends ROptions{
    public function __construct($instance) {
        $this->optionsArrayName = 'widget_rrandomizer';
        parent::__construct();
        $this->options = $instance;
    }
    
    public function deleteOption($optName){
        
    }
    
    public function updateOption($optName, $newValue){
        
    }
    
    public function updateOptions($newValues){
        
    }
    
    public function validateOptions($newOptions){
        
    }
}
