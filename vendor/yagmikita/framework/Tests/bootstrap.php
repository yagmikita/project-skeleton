<?php

require_once(realpath(__DIR__ . '/../../../../customize_autoloader.php'));

\Application\Application::constants(
    array(
        array('name' => 'APP_ENV', 'value' => 'development')
    )
);