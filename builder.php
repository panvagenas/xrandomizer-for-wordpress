<?php
/**
 * Created by PhpStorm.
 * User: vagenas
 * Date: 11/10/2014
 * Time: 10:30 μμ
 */

$phar = new Phar('core.phar', 0, "core.phar");
$phar->buildFromDirectory(dirname(dirname(__FILE__).'/core'));
$phar->setStub($phar->createDefaultStub(dirname(__FILE__).'core/stub.php'));