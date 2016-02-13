<?php


namespace Dever4eg\Classes;


use Dever4eg\Classes\Session;


class Notification
{
    protected static function GetConfig()
    {
        return require __DIR__ . '/../Config/Notif.php';
    }

    public static function Get()
    {
        Session::start();

        if(!isset($_SESSION['notification'])) {
            Session::destroy();
            return false;
        }

        $arr = $_SESSION['notification'];

        Session::destroy();

        $str = '<p><img src="'. self::GetConfig()[$arr['type']] .'">' . $arr['message'] .'</p>';

        return $str;
    }

    public static function Set($message, $type = 'Message')
    {
        Session::start();

        $arr['message'] = $message;
        $arr['type']    = $type;

        $_SESSION['notification'] = $arr;
    }
}