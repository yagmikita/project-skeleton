<?php

// Composers' autoloading
if (file_exists('vendor/autoload.php')) {
    $loader = include 'vendor/autoload.php';
}

$libPath = 'vendor/yagmikita/framework';

if (is_dir('vendor/yagmikita/framework')) {
    if (isset($loader)) {
        $loader->add('NG', $libPath);
    } else {
        throw new Exception('No autoloader instance is found', 500);
    }
} else {
    throw new RuntimeException('Invalid autoloading path', 500);
}