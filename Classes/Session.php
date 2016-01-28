<?php


namespace Game\Classes;


class Session
{
    public static function start()
    {
        // Если сессия уже была запущена, возвращаем TRUE
        if (session_id()) return true;
        else return session_start();
    }

    public static function destroy()
    {
        if (session_id()) {
            // Если есть активная сессия, удаляем куки сессии,
            setcookie(session_name(), session_id(), time() - 60 * 60 * 24);
            // и уничтожаем сессию
            session_unset();
            session_destroy();
        }
    }
}