<?php


namespace Dever4eg\Models;


use Dever4eg\Classes\Mvc\Model;

class Stock extends Model
{
    public static $table = 'stock';

    public $login;
    public $wood = 0;
}