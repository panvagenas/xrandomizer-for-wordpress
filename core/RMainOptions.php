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
    /**
     *
     * @var RProfile
     */
    private $profile;
    /**
     *
     * @var string
     */
    private $profileName;
    
    public function __construct() {
        $this->optionsArrayName = RRANDOMIZER_MAIN_OPTS_ARRAY_NAME;
        parent::__construct();
    }
    
    public function updateProfileOptions($newValues){
        if($this->profile == null){
            return false;
        }
        $valid = $this->profile->validateProfileOptions($newValues);
        $key = $this->getProfileKeyInOptions($this->profileName);
        $this->options[$key]['options'] = $valid;
        $this->profile->setProfileOptions($valid);
    }
    
    public function updateProfileContent($profContent) {
        if($this->profile == null){
            return false;
        }
        $key = $this->getProfileKeyInOptions($this->profileName);
        $this->options[$key]['content'] = (array)$profContent;
        $this->profile->setContent((array)$profContent);
    }
    
    public function validateOptions($newOptions){
        
    }
    
    public function loadProfile($profileName) {
        if($this->isProfileLoaded($profileName)){
            return $this;
        }
        $key = $this->getProfileKeyInOptions($profileName);
        if(is_numeric($key)){
            $this->profile = new RProfile($this->options[$key]);
        }
        return $this->isProfileLoaded($profileName);
    }
    
    private function isProfileLoaded($profileName) {
        return $this->profileName === $profileName;
    }
    
    private function getProfileKeyInOptions($profileName) {
        foreach ($this->options as $key => $value) {
            if($this->options[$key]['profileName'] === $profileName){
                return $key;
            }
        }
        return false;
    }
    
    public function loadOptions() {
        if(isset($this->optionsArrayName)){
            $opts = get_option($this->optionsArrayName);
        }
        $this->options = $opts ? $opts : $this->defaults;
        return $this;
    }
    
    public function getProfileOptions($profileName) {
        return $this->profile->getProfileOptions();
    }
    
    public function deleteProfile($profileName) {
        if($this->isProfileLoaded($profileName)){
            $this->unloadProfile($profileName);
        }
        
        $key = $this->getProfileKeyInOptions($profileName);
        if(is_numeric($key)){
            unset($this->options[$key]);
            $this->saveOptions($this->options);
        }
    }
    
    private function unloadProfile($profileName) {
        if($this->profileName === $profileName){
            $this->profile = null;
            $this->profileName = null;
        }
    }
}
