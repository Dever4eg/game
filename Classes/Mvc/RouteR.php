<?php


namespace Game\Classes\Mvc;

use Game\Classes\BException;
use Game\Controllers\Error;
use Game\Classes\http\E404Exception;

class Router
{
    static function Start()
    {
        $config = require_once __DIR__ . '/../../Config/RouteCfg.php';

        try
        {
            self::Routing($config);
        }
        catch(BException $e)
        {
            //Если ошибка 404
            if($e instanceof E404Exception) {
                header("HTTP/1.0 404 Not Found", true, 404);

                //Если шузествует контроллер ошибок и метод ошибки 404,
                //вызываем иначе просто выведем сообщение
                if( class_exists('Game\Controllers\Error') &&
                    method_exists('Game\Controllers\Error', 'ActionE404') )
                {
                    $ctrl = new Error();
                    $ctrl->ActionE404();
                } else {
                    $message = !empty($e->getMessage()) ? $e->getMessage() : '404';
                    die($message);
                }
            } else {
                throw $e;
            }
        }
    }

    static function Routing($config)
    {
        //получаем урл
        $url = $_SERVER['REQUEST_URI'];

        //Отбираем только путь
        $path = parse_url($url, PHP_URL_PATH);
        //Разбиваем в масив
        $parts = explode('/', $path);

        //Первый елемент - контроллер, второй - действие
        $ctrl   =   !empty( $parts[1] ) ? ucfirst($parts[1])    :  $config['DefaultController'];
        $Action =   !empty( $parts[2] ) ? ucfirst($parts[2])    :  $config['DefaultAction'];

        //ld($ctrl);
        //ld($Action);

        $ctrlName = 'Game\\Controllers\\' . $ctrl;
        $methodName = 'Action' . $Action;


        if(!class_exists($ctrlName)) {
            throw new E404Exception('404 controller:"'. $ctrlName .'" not found');
        }
        $controller = new $ctrlName();

        if(!method_exists($controller, $methodName)) {
            throw new E404Exception('404 action:'. $methodName .'
             not found in controller:'. $ctrlName .'');
        }

        if(method_exists($controller, 'init'))
            $controller->init();

        $controller->$methodName();
    }
}