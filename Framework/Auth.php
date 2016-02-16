<?php


namespace Dever4eg\framework;


class Auth
{
    static public function CookieSet($login)
    {
        setcookie('auth', $login, time()+60*60*24*4, '/');   //На 4 суток
    }

    static public function IsAuth()
    {
        return isset($_COOKIE['auth']);
    }

    static public function Logout()
    {
        setcookie('auth', '', time()-60*60*24*4, '/');
    }

    static public function GetLogin()
    {
        return $_COOKIE['auth'];
    }
}