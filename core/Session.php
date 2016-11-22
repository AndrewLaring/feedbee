<?php

namespace laring\core;

class Session
{
    public static function init()
    {
        $lifetime = 900000;
        @session_start();
        session_set_cookie_params($lifetime);
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key]))
            return $_SESSION[$key];
    }

    public static function destroy()
    {
        // unset($_SESSION);
        session_destroy();
    }
}