<?php


namespace Game\Models;


use Game\Classes\Mvc\Model;

class Stats extends Model
{
    static protected $table = 'stats';

    public $login;
    public $level;
    public $energy;
    public $health;
    public $credits;
    public $lapis;
    public $emerald;
}