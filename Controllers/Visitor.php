<?php


namespace Game\Controllers;


use Game\Classes\Auth;
use Game\Classes\Mvc\Controller;
use Game\Classes\Mvc\View;
use Game\Models\User;
use Game\Classes\Notification;
use Game\Classes\Session;

class Visitor extends Controller
{

    public function __construct()
    {
        if (Auth::IsAuth()) {
            header('location: /game');
            die;
        }
    }

    public function ActionIndex()
    {
        $view = new View();
        $view->display('visitor/index');
    }

    public function ActionLogin()
    {
        if (!isset($_POST['submit'])) {
            $view = new View();
            $view->notification = Notification::Get();
            $view->display('Visitor/login');
        } else {
            $err = '';

            $login = $_POST['login'];
            $password = $_POST['password'];

            if (empty($login)) {
                $err = 'Введите логин!';
            } elseif (empty($password)) {
                $err = 'Введите пароль!';
            } elseif (false === User::FindByCols([
                        'login' => $login,
                        'password' => md5(md5($password . 'craft')),
                    ]
                )
            ) {
                $err = 'Логин или пароль введены неверно';
            }

            if (empty($err)) {
                Auth::CookieSet($login);

                Notification::Set('Вы вошли на сайт', 'Accept');
                header('location: /game');
                die;
            } else {

                Notification::Set($err, 'Error');

                header('location: /visitor/login');
                die;
            }
        }
    }

    public function ActionRegister()
    {
        if (!isset($_POST['submit'])) {
            $view = new View();
            $view->notification = Notification::Get();

            $view->display('Visitor/register');
        } else {
            $err = '';

            $login = $_POST['login'];
            $password = $_POST['password'];

            Session::start();
            $captcha = $_SESSION['rand_code'];
            Session_unset();

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
            if (empty($err)) {
                $user = new User();

                $user->login = $login;
                $user->password = md5(md5($password . 'craft'));
                $user->date = date('Y-m-d h:i:sa');

                $user->save();

                Notification::Set($login . ' ,Вы зарегистрировались, можете войти на сайт', 'Accept');

                header('location: /visitor/login');
                die;
            } else {

                Notification::Set($err, 'Error');

                header('location: /visitor/register');
                die;
            }
        }
    }
}