<?php


namespace App\core;

class SessionValidator extends Validator
{
    public static function checkIsNotLogged()
    {
        if (isset($_SESSION['logged'])) {
            if ($_SESSION['logged'] == true) {
                header('Location:/' . App::get('config')['App']['AppName']);
            }
        }
    }

    public static function checkIsLogged()
    {
        if (!isset($_SESSION['logged']) || $_SESSION['logged'] == false) {
            header('Location:/' . App::get('config')['App']['AppName']);
        }
    }

    public static function checkIsAdmin()
    {
        if (!isset($_SESSION['admin']) || $_SESSION['admin'] == 0) {
            header('Location:/' . App::get('config')['App']['AppName']);
        }
    }
}