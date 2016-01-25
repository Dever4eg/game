<?php

error_reporting(E_ALL);

require_once __DIR__ . '/autoload.php';

use App\Classes\Route;
if( class_exists('Route') )
    Route::Start();
else
    echo 'Ошибка маршрутизатор не найден';