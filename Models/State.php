<?php


namespace Dever4eg\Models;


use Dever4eg\Classes\Mvc\Model;

class State extends Model
{
    static protected $table = 'state';

    public $login;
    public $state;
    public $meta;
}