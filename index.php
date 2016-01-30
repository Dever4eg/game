<?php

//Отображение всех ошибок
error_reporting(E_ALL);

//Автозагрузка
require_once __DIR__ . '/autoload.php';

use Game\Classes\App;

//Запуск приложения
App::Run();
