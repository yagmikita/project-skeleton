<?php

// Composers' autoloading
$autoloaderPath = realpath(__DIR__.'/vendor/autoload.php');

if (!file_exists($autoloaderPath))
    throw new RuntimeException('Autoloader is missing. Run composer to initiate it.', 500);
$loader = include $autoloaderPath;


/* Manual adding an autoloading namespace -- skipped *
 * $libPath = realpath(__DIR__.'/vendor/yagmikita/framework/');
 * 
 * if (is_dir($libPath)) {
 *     if (isset($loader)) {
 *         $loader->add('NG', $libPath);
 *         //var_dump($loader);exit;
 *     } else {
 *         throw new Exception('No autoloader instance is found', 500);
 *     }
 * } else {
 *     throw new RuntimeException('Invalid autoloading path', 500);
 * }
 * * */
