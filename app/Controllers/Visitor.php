<?php


namespace Dever4eg\App\Controllers;


use Dever4eg\Framework\Auth;
use Dever4eg\Framework\Mvc\Controller;
use Dever4eg\Framework\Mvc\View;
use Dever4eg\App\Models\Forest;
use Dever4eg\App\Models\Stats;
use Dever4eg\App\Models\Stock;
use Dever4eg\App\Models\User;
use Dever4eg\Framework\Notification;
use Dever4eg\Framework\Session;
use Dever4eg\App\Models\State;

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

        //$captcha = $_SESSION['rand_code'];
        $captcha = $_POST['captcha'];

        unset($_SESSION['rand_code']);

        $err = User::Validate($login, $password, $_POST['password_to'], $captcha);

        if (empty($err)) {
            $user = new User($login, $password);
            $user->login = $login;
            $user->password = sha1($password);
            $user->save();

            $stats = new Stats();
            $stats->login = $user->login;
            $stats->Save();

            $state = new State();
            $state->login = $user->login;
            $state->save();

            $forest = new Forest();
            $forest->login = $user->login;
            $forest->save();

            $stock = new Stock();
            $stock->login = $user->login;
            $stock->save();

            Notification::Set($login . ', Вы зарегистрировались, можете войти на сайт', 'Accept');
            header('location: /visitor/login'); die;
        } else {
            Notification::Set($err, 'Error');
            header('location: /visitor/register'); die;
        }
    }
}