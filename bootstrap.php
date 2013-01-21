<?php

date_default_timezone_set('Europe/Kiev');

defined('DIRECTORY_SEPARATOR') or define('DIRECTORY_SEPARATOR', '/');
defined('APP_PATH') or define('APP_PATH', __DIR__);
defined('CLASS_PARAM_IS_NOT_SET') || define('CLASS_PARAM_IS_NOT_SET', 'The parameter "%s" you are trying to access is not presenter in the class "%s".');
defined('DEBUG_MODE') or define('DEBUG_MODE', false);

require_once(APP_PATH . DIRECTORY_SEPARATOR. 'AutoloaderPSR0.php');

spl_autoload_register('AutoloaderPSR0::autoload');

use \Types;

$request = new \Application\Request\Request;