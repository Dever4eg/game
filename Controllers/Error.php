<?php


namespace Game\Controllers;


use Game\Classes\Mvc\Controller;
use Game\Classes\Mvc\View;


class Error extends Controller
{
    public function ActionE404()
    {
        $view = new View();
        $view->display('Error/E404');
    }
}