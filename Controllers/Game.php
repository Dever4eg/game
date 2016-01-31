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
        if ($user === false) {
            Auth::Logout();
            header('location: /visitor/login');
            die;
        }

        $this->view->login = $user->login;
        $this->view->stats = Stats::FindByColumn('userId', $user->id);
    }

    public function ActionIndex()
    {
        $this->view->display('Game/index');
    }

    public function ActionClan()
    {
        $this->view->display('Game/clan');
    }

    public function ActionCraft()
    {
        $this->view->display('Game/craft');
    }

    public function ActionEvents()
    {
        $this->view->display('Game/events');
    }

    public function ActionFarmer()
    {
        $this->view->display('Game/farmer');
    }

    public function ActionFight()
    {
        $this->view->display('Game/fight');
    }

    public function ActionForest()
    {
        $this->view->display('Game/forest');
    }

    public function ActionFurnace()
    {
        $this->view->display('Game/furnace');
    }

    public function ActionHall_of_fame()
    {
        $this->view->display('Game/hall_of_fame');
    }

    public function ActionHike()
    {
        $this->view->display('Game/hike');
    }

    public function ActionHome()
    {
        $this->view->display('Game/home');
    }

    public function ActionHunter()
    {
        $this->view->display('Game/hunter');
    }

    public function ActionMine()
    {
        $this->view->display('Game/mine');
    }

    public function ActionStock()
    {
        $this->view->display('Game/stock');
    }

    public function ActionTasks()
    {
        $this->view->display('Game/tasks');
    }

    public function ActionTrade()
    {
        $this->view->display('Game/trade');
    }

    public function ActionVillage()
    {
        $this->view->display('Game/village');
    }


    public function ActionLogout()
    {
        Auth::Logout();
        header('location: /');
        die;
    }
}