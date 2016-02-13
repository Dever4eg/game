<?php


namespace Dever4eg\App\Controllers;

use Dever4eg\Framework\Mvc\Controller;
use Dever4eg\Framework\Auth;
use Dever4eg\App\Models\State;
use Dever4eg\Framework\Mvc\View;
use Dever4eg\Framework\Notification;
use Dever4eg\App\Models\Stats;

class Beginner extends Controller
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
        if ($state->state == 'gamer') {
            header('location: /game');
            die;
        }
    }

    public function ActionIndex()
    {
        $login = Auth::GetLogin();
        $state = State::FindByColumn('login', $login);

        if ($state->state == 'game') {
            header('location: /game');
            die;
        }

        $this->view->display('Game/beginner/meta_' . $state->meta);
    }

    public function ActionNext()
    {
        $login = Auth::GetLogin();
        $state = State::FindByColumn('login', $login);
        $state->Next();

        header('location: /beginner');
    }
}