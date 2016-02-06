<?php


namespace Dever4eg\Models;


use Dever4eg\Classes\Mvc\Model;

class Forest extends Model
{
    public static $table = 'forest';

    public $login;
    public $found = false;
    public $height = null;
    public $state = null;
}