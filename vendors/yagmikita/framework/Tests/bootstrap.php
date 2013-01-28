<?php

require_once(__DIR__ . '/../../../../customize-autoloader.php');

spl_autoload_register('Autoloader::autoload');

\Application\Application::constants(
    array(
        array('name' => 'APP_ENV', 'value' => 'development')
    )
);