<?php


namespace Dever4eg\App\Controllers;

use Dever4eg\framework\Mvc\Controller;
use Dever4eg\framework\Mvc\View;

class KnowBase extends Controller
{
    public $view;

    public function init()
    {
        $this->view = new View();
    }

    public function ActionBake()
    {
        $this->view->display('/KnowBase/bake');
    }

    public function ActionBasic()
    {
        $this->view->display('/KnowBase/basic');
    }

    public function ActionClan()
    {
        $this->view->display('/KnowBase/clan');
    }

    public function ActionEmeralds()
    {
        $this->view->display('/KnowBase/emeralds');
    }

    public function ActionFarm()
    {
        $this->view->display('/KnowBase/farm');
    }

    public function ActionExperience()
    {
        $levels = require __DIR__ . '/../Config/game/Levels.php';
        $this->view->levels = $levels;
        $this->view->display('KnowBase/experience');
    }

    public function ActionFight()
    {
        $this->view->display('/KnowBase/fight');
    }

    public function ActionForest()
    {
        $this->view->display('/KnowBase/forest');
    }

    public function ActionForge()
    {
        $this->view->display('/KnowBase/forge');
    }

    public function ActionHunting()
    {
        $this->view->display('/KnowBase/hunting');
    }

    public function ActionIndex()
    {
        $this->view->display('/KnowBase/index');
    }

    public function ActionMine()
    {
        $this->view->display('/KnowBase/mine');
    }

    public function ActionSkills()
    {
        $this->view->display('/KnowBase/skills');
    }

    public function ActionStock()
    {
        $this->view->display('/KnowBase/stock');
    }

    public function ActionTrade()
    {
        $this->view->display('/KnowBase/trade');
    }

    public function ActionWorkbench()
    {
        $this->view->display('/KnowBase/Workbench');
    }
}