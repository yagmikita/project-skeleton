<?php

class AutoloaderPSR0
{

    static public function autoload($className)
    {
        $dir = __DIR__;
        $className = ltrim($className, '\\');
        $fileName  = '';
        $namespace = '';
        if ($lastNsPos = strripos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        $path = $dir . DIRECTORY_SEPARATOR . $fileName;

        if (!is_file($path)) {
            throw new Exception("File '{$path}' not exists");
        }

        require $path;
    }

}