<?php


namespace Dever4eg\App\Controllers;

use Dever4eg\framework\Mvc\Controller;
use Dever4eg\framework\Mvc\View;
use Dever4eg\framework\Notification;
use Dever4eg\framework\Auth;
use Dever4eg\framework\Session;
use Dever4eg\App\Models\Forest;
use Dever4eg\App\Models\State;
use Dever4eg\App\Models\Stats;
use Dever4eg\App\Models\Stock;
use Dever4eg\App\Models\User;


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

        $stats = Stats::FindByColumn('login', Auth::GetLogin());
        if ($stats === false) {
            Auth::Logout();
            header('location: /visitor/login');
            die;
        }


        $this->view->stats = $stats;


        $state = State::FindByColumn('login', Auth::GetLogin());

        //TODO: баг не работает logout если мы еще beginner !!!

        if ($state->state == 'beginner') {
            header('location: /beginner');
            die;
        }
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
        $forest = Forest::FindByColumn('login', Auth::GetLogin());

        if (isset($_GET['act'])) {
            if ($_GET['act'] == 'find') {
                $forest->Search();
            } elseif ($_GET['act'] == 'chop') {
                $forest->Chop();
            }
            header('location: /game/forest');
        }

        $this->view->forest = $forest;
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
        $stock = Stock::FindByColumn('login', Auth::GetLogin());

        $this->view->stock = $stock;
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

    public function ActionUser()
    {
        $this->view->display('Game/user');
    }

    public function ActionLogout()
    {
        Auth::Logout();
        header('location: /');
        die;
    }
}