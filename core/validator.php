<?php

namespace App\core;

class Validator
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

    public static function checkProductName($name)
    {
        if (strlen($name) > 30 || strlen($name) <= 0) {
            $_SESSION['errorProductName'] = "Nazwa przedmiotu powinna mieć od 1 do 29 znaków";
            return false;
        } else {
            return $name;
        }
    }

    public static function checkProductPrice($price)
    {
        if ($price <= 0) {
            $_SESSION['errorPrice'] = "Podana cena musi być liczbą większą od 0";
            return false;
        } elseif (is_numeric($price)) {//poprawna liczba
            $price = round($price, 2);
            return $price;
        } else {
            $_SESSION['errorPrice'] = "Podana cena musi być liczbą większą od 0";
            return false;
        }
    }

    public static function checkProductNumber($number)
    {
        if ($number <= 0) {
            $_SESSION['errorNumber'] = "Ilość musi być liczbą całkowitą większą od 0";
            return false;
        } else {
            return $number;
        }
    }

    public static function checkLogin($login)
    {
        if (strlen($login) > 3 && strlen($login) < 20) {
            if (ctype_alnum($login)) {
                $_SESSION['registrationLogin'] = $login;
                return $login;
            } else {
                $_SESSION['errorRegLogin'] = "Login może zawierać znaki od A do Z oraz liczby 0-9";
                return false;
            }
        } else {
            $_SESSION['errorRegLogin'] = "Login musi mieć od 3 do 20 znaków";
            return false;
        }
    }

    public static function checkPassword($password, $password2)
    {
        if (strlen($password) > 5 && strlen($password) < 14) {
            if ($password == $password2) {
                return $password;
            } else {
                $_SESSION['errorRegPassConfirmation'] = "Podane hasła muszą być jednakowe";
                return false;
            }
        } else {
            $_SESSION['errorRegPassword'] = "Hasło musi mieć od 6 do 13 znaków";
            return false;
        }
    }

    public static function checkEmail($email)
    {
        $emailClear = filter_var($email, FILTER_SANITIZE_EMAIL);
        if ($email != $emailClear || filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $_SESSION['errorRegEmail'] = "Podano niepoprawny adres E-mail";
            return false;
        } else {
            $_SESSION['errorRegEmail'] = $email;
            return $email;
        }
    }
}
