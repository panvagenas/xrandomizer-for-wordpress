<?php

/**
 * RShortcodeOptions.php
 *
 * @package   @todo
 * @author    Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @link      @todo
 * @copyright 2014 Panagiotis Vagenas <pan.vagenas@gmail.com>
 */

/**
 * Description of RShortcodeOptions
 * 
 * @package @todo
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 */
class RShortcodeOptions extends ROptions{
    public function __construct() {
        $this->optionsArrayName = 'RandomizerShortCodeOptions';
        parent::__construct();
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
