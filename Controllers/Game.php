<?php


namespace Game\Controllers;

use Game\Classes\Mvc\Controller;
use Game\Classes\Mvc\View;
use Game\Classes\Notification;
use Game\Classes\Auth;


class Game extends Controller
{
    public $view;

    public function __construct()
    {
        if (!Auth::IsAuth()) {
            header('location: /visitor/login');
            die;
        }

        $this->view = new View();
        $this->view->StatsShow = true;
        $this->view->login = Auth::GetLogin();
    }

    public function ActionIndex()
    {
        $this->view->notification = Notification::Get();

        $this->view->display('Game/index');
    }

    public function ActionLogout()
    {
        Auth::Logout();
        header('location: /');
        die;
    }
}