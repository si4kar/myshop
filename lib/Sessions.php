<?php
class Sessions extends Arrays
{
     public static function __constructor()
    {
        $sessionId = session_id();
        if (empty($sessionId)) {
            session_start();
        }

    }

    public static function addFlash($key, $value)
        {
            $_SESSION[$key] = $value;
        }


    public static function getFlash($key, $delete = true)
        {
            $flash = parent:: getArrayValue($_SESSION, $key);

            if ($flash && $delete) {
                unset($_SESSION[$key]);
            }

            return $flash;
        }

    }

