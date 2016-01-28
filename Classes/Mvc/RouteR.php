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
            if($e instanceof E404Exception) {
                header("HTTP/1.0 404 Not Found", true, 404);

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
        $url = $_SERVER['REQUEST_URI'];

        $path = parse_url($url, PHP_URL_PATH);
        $parts = explode('/', $path);

        $ctrl = !empty( $parts[1] ) ? $parts[1] : $config['DefaultController'];
        $Action = !empty( $parts[2] ) ? $parts[2] : $config['DefaultAction'];

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
        $controller->$methodName();
    }
}