<?php


namespace Game\Controllers;

use Game\Classes\Mvc\Controller;
use Game\Classes\Mvc\View;
use Game\Classes\Notification;
use Game\Classes\Auth;
use Game\Models\Stats;
use Game\Models\User;


class Game extends Controller
{
    public $view;

    public function init()
    {
        //если не авторизован перенаврабляем на страницу авторизации
        if (!Auth::IsAuth()) {
            header('location: /visitor/login');
            die;
        }

        $this->view = new View();

        $this->view->notification = Notification::Get();

        $user = User::FindByColumn('login', Auth::GetLogin());
        $this->view->login = $user->login;
        $this->view->stats = Stats::FindByColumn('userId', $user->id);
    }

    public function ActionIndex()
    {
        $this->view->display('Game/index');
    }

    public function ActionLogout()
    {
        Auth::Logout();
        header('location: /');
        die;
    }
}