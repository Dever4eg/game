<?php


namespace Dever4eg\App\Models;


use Dever4eg\Framework\Mvc\Model;

class Stock extends Model
{
    public static $table = 'stock';

    public $login;
    public $wood = 0;
}