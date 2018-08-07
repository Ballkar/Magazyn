<?php

namespace App\core;

class Message
{
    public static function showAndDelete($message, $class)
    {
        if (isset($_SESSION[$message])) {
            echo "<span class=$class>" . $_SESSION[$message] . "</span>";
            unset($_SESSION[$message]);
        }
    }

    public static function showValueAndDelete($message)
    {
        if (isset($_SESSION[$message])) {
            echo $_SESSION[$message];
            unset($_SESSION[$message]);
        }
    }

    public static function showMassage($message, $class)
    {
        echo "<span class=$class>" . $message . "</span>";
    }
}
