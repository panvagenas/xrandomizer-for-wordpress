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
    private $profileOptions;
    private $content;
    
    public function __construct(Array $profileOptions, Array $content) {
        $this->profileOptions = $profileOptions;
        $this->content = $content;
    }
}
