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
    private static $RRandomizer_widget = 'admin/RRandomizer_widget.php';
    private static $RRandomizerAdmin = 'admin/RRandomizerAdmin.php';
    
    private static $RDefaults = 'core/RDefaults.php';
    private static $RMainOptions = 'core/RMainOptions.php';
    private static $ROptions = 'core/ROptions.php';
    private static $RRandomizeIt = 'core/RRandomizeIt.php';
    private static $RRShortcodeOptions = 'core/RShortcodeOptions.php';
    private static $RThemes = 'core/RThemes.php';
    private static $RViewer = 'core/RViewer.php';
    private static $RWidgetOptions = 'core/RWidgetOptions.php';

    public static function requireOnce($path) {
        require_once RRANDOMIZER_BASE_PATH . $path;
    }
}
