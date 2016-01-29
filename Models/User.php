<?php


namespace Game\Models;


use Game\Classes\Mvc\Model;

class User extends Model
{
    protected static $table = 'users';

    public $id;
    public $login;
    public $password;
    public $email = null;
    public $date;

}