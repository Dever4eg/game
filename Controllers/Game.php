<?php


namespace Game\Controllers;

use Game\Classes\Mvc\Controller;
use Game\Classes\Mvc\View;
use Game\Classes\Notification;
use Game\Classes\Auth;


class Game extends Controller
{
    public function __construct()
    {
        if (!Auth::IsAuth()) {
            header('location: /visitor/login');
            die;
        }
    }

	public function ActionIndex()
	{
        $view = new View();
        $view->notification = Notification::Get();

        $view->display('Game/index');
	}

    public function ActionLogout()
    {
        Auth::Logout();
        header('location: /');
        die;
    }
}