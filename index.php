<?php

//Отображение всех ошибок
error_reporting(E_ALL);

//Автозагрузка
require_once __DIR__ . '/autoload.php';

use Dever4eg\Classes\App;

ladybug_set_theme('modern');

//Запуск приложения
App::Run();
