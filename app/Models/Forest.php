<?php


namespace Dever4eg\App\Models;


use Dever4eg\Framework\Mvc\Model;
use Dever4eg\Framework\Auth;


class Forest extends Model
{
    public static $table = 'forest';

    public $login;
    public $found = false;
    public $height = null;
    public $state = null;

    public function Search()
    {
        $this->height = rand(5, 16);
        $this->state = 'find';
        $this->found = true;
        $this->save();
    }

    public function Chop()
    {
        //Увеличеваем дерево на складе на 1
        $stock = Stock::FindByColumn('login', Auth::GetLogin());
        $stock->wood += 1;
        $stock->save();

        if ($this->height != 1) {
            $this->height -= 1;
            $this->state = 'chopping';
            $this->save();
        } else {
            $this->height = null;
            $this->state = 'find';
            $this->found = false;
            $this->save();
        }
    }
}