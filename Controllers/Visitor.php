<?php


namespace Game\Controllers;


use Game\Classes\Mvc\Controller;
use Game\Classes\Mvc\View;

class Visitor extends Controller
{
    public function ActionIndex()
    {
        $view = new View();
        $view->display('visitor/index');
    }
}