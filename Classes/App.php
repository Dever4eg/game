<?php


namespace Dever4eg\Classes;

use Dever4eg\Classes\Mvc\Router;

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