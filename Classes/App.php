<?php


namespace Dever4eg\Classes;

use Dever4eg\Classes\Mvc\Router;

class App
{
    protected $route;

    public function Run()
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