<?php


namespace Game\Controllers;


use Game\Classes\Mvc\Controller;
use Game\Classes\Mvc\View;


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