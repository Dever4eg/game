<?php


namespace Dever4eg\App\Controllers;


use Dever4eg\framework\Mvc\Controller;
use Dever4eg\framework\Mvc\View;


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