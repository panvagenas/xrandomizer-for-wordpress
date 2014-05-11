<?php

/**
 * RMainOptions.php
 *
 * @package   @todo
 * @author    Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @link      @todo
 * @copyright 2014 Panagiotis Vagenas <pan.vagenas@gmail.com>
 */

/**
 * Description of RMainOptions
 * 
 * @package @todo
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 */
class RMainOptions extends ROptions{
    private $profile = array();
    private $profileName;
    
    public function __construct() {
        $this->optionsArrayName = RRANDOMIZER_MAIN_OPTS_ARRAY_NAME;
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
    
    public function loadProfile($profileName) {
        
    }
    
    public function getProfileOptions($profileName) {
        
    }
    
    public function deleteProfile($profileName) {
        
    }
}
