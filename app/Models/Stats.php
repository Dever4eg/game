<?php


namespace Dever4eg\App\Models;


use Dever4eg\framework\Mvc\Model;

class Stats extends Model
{
    static protected $table = 'stats';

    public $login;
    public $level = 1;
    public $energy = 1200;
    public $health = 20;
    public $credits = 0;
    public $emerald = 0;
}