<?php

/**
 * RProfile.php
 *
 * @package   @todo
 * @author    Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @link      @todo
 * @copyright 2014 Panagiotis Vagenas <pan.vagenas@gmail.com>
 */

/**
 * Description of RProfile
 * 
 * @package @todo
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 */
class RProfile {
    private $profileOptions = array(
        'content' => false,
        'options' => false
    );
    private $content;
    
    public function __construct(Array $profileOptions) {
        $this->profileOptions = $profileOptions;
        $this->content = $profileOptions['content'];
    }
    
    public function validateProfileOptions($newOpts) {
        
    }
    
    public function getProfileOptions() {
        return $this->profileOptions;
    }

    public function getContent() {
        return $this->content;
    }
    
    public function setProfileOptions($profileOptions) {
        if(count(array_diff_assoc($this->profileOptions, $profileOptions)) === 0){
            $this->profileOptions = $profileOptions;
        }
    }

    public function setContent($content) {
        $this->content = $content;
    }
}
