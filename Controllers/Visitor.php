<?php


namespace Game\Controllers;


use Game\Classes\Auth;
use Game\Classes\Mvc\Controller;
use Game\Classes\Mvc\View;
use Game\Models\Stats;
use Game\Models\User;
use Game\Classes\Notification;
use Game\Classes\Session;
use Game\Models\State;

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
                        'password' => sha1($password),
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
            $this->Register();
        }
    }

    public function Register()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];

        Session::start();
        $captcha = $_SESSION['rand_code'];
        unset($_SESSION['rand_code']);

        $err = User::Validate($login, $password, $_POST['password_to'], $captcha);

        if (empty($err)) {
            $user = new User();
            $user->login = $login;
            $user->password = sha1($password);
            $user->date = date('Y-m-d h:i:sa');
            $user->save();

            $stats = new Stats();
            $stats->login = $user->login;
            $stats->level = 1;
            $stats->energy = 1200;
            $stats->health = 120;
            $stats->credits = 0;
            $stats->lapis = 0;
            $stats->emerald = 0;
            $stats->Save();

            $state = new State();
            $state->login = $user->login;
            $state->state = 'beginner';
            $state->meta = 1;
            $state->save();



            Notification::Set($login . ', Вы зарегистрировались, можете войти на сайт', 'Accept');
            header('location: /visitor/login'); die;
        } else {
            Notification::Set($err, 'Error');
            header('location: /visitor/register'); die;
        }
    }
}