<?php


namespace App\core;

class ProductValidator extends SessionValidator
{
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
}