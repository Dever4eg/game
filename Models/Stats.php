<?php


namespace Dever4eg\Models;


use Dever4eg\Classes\Mvc\Model;

class Stats extends Model
{
    static protected $table = 'stats';

    public $login;
    public $level = 1;
    public $energy = 1200;
    public $health = 10;
    public $credits = 0;
    public $lapis = 0;
    public $emerald = 0;
}