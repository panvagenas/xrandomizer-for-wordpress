<?php

/**
 * RPaths.php
 *
 * @package   @todo
 * @author    Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @link      @todo
 * @copyright 2014 Panagiotis Vagenas <pan.vagenas@gmail.com>
 */

/**
 * Description of RPaths
 * 
 * @package @todo
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 */
class RPaths {
    public static $RRandomizer_widget = 'admin/RRandomizer_widget.php';
    public static $RRandomizerAdmin = 'admin/RRandomizerAdmin.php';
    
    public static $RDefaults = 'core/RDefaults.php';
    public static $RMainOptions = 'core/RMainOptions.php';
    public static $ROptions = 'core/ROptions.php';
    public static $RRandomizeIt = 'core/RRandomizeIt.php';
    public static $RRShortcodeOptions = 'core/RShortcodeOptions.php';
    public static $RThemes = 'core/RThemes.php';
    public static $RViewer = 'core/RViewer.php';
    public static $RWidgetOptions = 'core/RWidgetOptions.php';
    
    public static $RShortCode = 'public/RShortCode.php';
    public static $RRandomizer = 'public/RRandomizer.php';

    public static function requireOnce($path) {
        require_once RRANDOMIZER_BASE_PATH . $path;
    }
}
