<?php


namespace Dever4eg\Controllers;


use Dever4eg\Classes\Mvc\Controller;
use Dever4eg\Classes\Mvc\View;


class Other extends Controller
{
    public function ActionAboutGame()
    {
        $view = new View();
        $view->Display('Other/aboutGame');
    }

   	public function ActionRegulations()
    {
        $view = new View();
        $view->Display('Other/regulations');
    }

    public function ActionKnowBase()
    {
        $view = new View();

        if(!empty($_GET['article'])) {
            $view->Display('Other/KnowBase/'. $_GET['article']);
        } else {
            $view->Display('Other/knowBase/index');
        }
    }
}