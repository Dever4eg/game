<?php


namespace Dever4eg\App\Controllers;


use Dever4eg\framework\Mvc\Controller;
use Dever4eg\framework\Mvc\View;


class Error extends Controller
{
    public function ActionE404()
    {
        $view = new View();
        $view->display('Error/E404');
    }
}