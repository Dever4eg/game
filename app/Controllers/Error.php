<?php


namespace Dever4eg\App\Controllers;


use Dever4eg\Framework\Mvc\Controller;
use Dever4eg\Framework\Mvc\View;


class Error extends Controller
{
    public function ActionE404()
    {
        $view = new View();
        $view->display('Error/E404');
    }
}