<?php


namespace Game\Models;


use Game\Classes\Mvc\Model;

class User extends Model
{
    static protected $table = 'users';

    public $login;
    public $password;
    public $hash;
    public $email = null;
    public $date;

    public static function Validate($login, $password, $password_to, $captcha)
    {
        $err = '';

        if (empty($login)) {
            $err = 'Введите логин!';
        } elseif (empty($password)) {
            $err = 'Введите пароль!';
        } elseif (empty($_POST['password_to'])) {
            $err = 'Введите пароль повторно!';
        } elseif ($password != $_POST['password_to']) {
            $err = 'Пароли не совпадают!';
        } elseif (!preg_match('~^[-a-zA-Z0-9_]+$~', $login)) {
            $err = 'Логин может состоять только из букв латинского алфавита и цифр,
	       				а также "-","_"';
        } elseif (!preg_match('~^[-a-zA-Z0-9_]+$~', $password)) {
            $err = 'Пароль может состоять только из букв латинского алфавита и цифр,
	       				а также "-","_"';
        } elseif (strlen($login) < 3 or strlen($login) > 18) {
            $err = 'Логин должен быть не меньше 3-х символов и не больше 18-ти';
        } elseif (strlen($password) > 18) {
            $err = 'Пароль должен быть не больше 18-ти символов';
        } elseif (empty($_POST['captcha'])) {
            $err = 'Введите проверочный код';
        } elseif ($captcha != $_POST['captcha']) {
            $err = 'Проверочный код введен неверно';
        } elseif (false !== User::FindByColumn('login', $_POST['login'])) {
            $err = 'Пользователь с таким логином уже существует';
        }

        return $err;
    }
}