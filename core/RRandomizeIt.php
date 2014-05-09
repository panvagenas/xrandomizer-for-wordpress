<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RRandomizIt
 *
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 */
class RRandomizeIt {
    /**
     *
     * @var array 
     */
    private $original;
    /**
     *
     * @var array 
     */
    private $randomized;
    
    /**
     * 
     * @param array $input
     * @return type
     */
    public function randomizeArray(Array $input) {
        $this->original = $input;
        $this->randomized = $this->original;
        return shuffle($this->randomized) ? $this->randomized : $this->original;
    }
    
    /**
     * 
     * @param WP_Query $wpQuery
     * @return WP_Query
     */
    public function randomizeWP_Query(WP_Query $wpQuery){
        if(!isset($wpQuery->posts)){
            return $wpQuery;
        }
        $wpQuery->posts = $this->randomizeArray($wpQuery->posts);
        return $wpQuery;
    }
}
