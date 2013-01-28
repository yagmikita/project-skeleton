<?php

require_once(__DIR__ . '/../customize_autoloader.php');

/**
 * Uncomment this if Windows platform is used
 * require_once(__DIR__ . '\..\customize_autoloader.php');
 */

spl_autoload_register('Autoloader::autoload');

$app = new \Application\Application(
    new \Application\Request,
    array(
        array('name' => 'APP_ENV', 'value' => 'development')
    )
);
$app->run();