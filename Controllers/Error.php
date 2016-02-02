<?php


namespace Dever4eg\Controllers;


use Dever4eg\Classes\Mvc\Controller;
use Dever4eg\Classes\Mvc\View;


class Error extends Controller
{
    public function ActionE404()
    {
        $view = new View();
        $view->display('Error/E404');
    }
}