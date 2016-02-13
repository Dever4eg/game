<?php


namespace Dever4eg\Controllers;


use Dever4eg\Classes\Mvc\Controller;
use Dever4eg\Classes\Mvc\View;


class Pages extends Controller
{
    public function ActionAboutGame()
    {
        $view = new View();
        $view->Display('Pages/aboutGame');
    }

   	public function ActionRegulations()
    {
        $view = new View();
        $view->Display('Pages/regulations');
    }
}