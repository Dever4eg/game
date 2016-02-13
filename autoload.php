<?php

function GameAutoload($class)
{
    $arr = explode('\\', $class);

    $arr[0] = __DIR__ . DIRECTORY_SEPARATOR .'App';
    $path_App = implode(DIRECTORY_SEPARATOR, $arr) . '.php';

    $arr[0] = __DIR__;
    $path = implode(DIRECTORY_SEPARATOR, $arr) . '.php';


    if (file_exists($path_App))
        require_once $path_App;
    if (file_exists($path))
        require_once $path;
}

spl_autoload_register('GameAutoload');

if (file_exists(__DIR__ . '/vendor/autoload.php'))
    require_once __DIR__ . '/vendor/autoload.php';

ladybug_set_theme('modern');