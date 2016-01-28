<?php


namespace Game\Classes;



class Notification
{
    protected static function GetConfig()
    {
        return require __DIR__ . '/../Config/NotifCfg.php';
    }

    static function Get()
    {
        session_start();

        if(!isset($_SESSION['notification'])) {
            session_destroy();
            return false;
        }

        $arr = $_SESSION['notification'];
        unset($_SESSION['notification']);
        session_destroy();

        $str = '<img src="'. self::GetConfig()[$arr['type']] .'">' . $arr['message'];

        return $str;
    }

    static function Set($message, $type = 'Message')
    {
        session_name('notification');
        session_start();

        if(!isset($_SESSION['notification']))
            return false;

        $arr = $_SESSION['notification'];

        $arr['message'] .= $message;
        $arr['type']    .= $type;

        $_SESSION['notification'] = $arr;
    }
}