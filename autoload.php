<?php


function MyAutoload($class)
{
    $arr = explode('\\', $class);
    $arr[0] = __DIR__;
    $path = implode(DIRECTORY_SEPARATOR, $arr) . '.php';

    if( file_exists($path) )
        require_once $path;
}

spl_autoload_register('MyAutoload');

if( file_exists(__DIR__ . '/vendor/autoload.php') )
    require_once __DIR__ . '/vendor/autoload.php';
