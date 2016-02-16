<?php


namespace Dever4eg\framework;

use Dever4eg\framework\Mvc\Router;

class App
{
    protected $route;

    public static function Run()
    {
        require_once __DIR__ .'/../autoload.php';

        try
        {
            $router = new Router();
            $router->Start();
        }
        catch(\Exception $e)
        {
            //TODO: критическое логирование
            ld($e);
            die('Критическое исключение');
        }
    }
}