<?php


namespace Game\Classes;

use Game\Classes\Mvc\Router;

class App
{
    static function Run()
    {
        try
        {
            Router::Start();
        }
        catch(\Exception $e)
        {
            //Здесь будет логирование
            die('Критическое исключение');
        }
    }
}