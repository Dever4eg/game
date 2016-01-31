<?php


namespace Game\Models;


use Game\Classes\Mvc\Model;

class State extends Model
{
    static protected $table = 'state';

    public $login;
    public $state;
    public $meta;
}