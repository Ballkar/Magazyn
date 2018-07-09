<?php
/**
 * Created by PhpStorm.
 * User: Miszczu
 * Date: 2018-03-23
 * Time: 11:10
 */

class validator
{



    public static function checkIsNotLogged(){
        if (isset($_SESSION['zalogowany'])){
            if ($_SESSION['zalogowany']==true) {
                header('Location:/portal');
            }
        }
    }
    public static function checkIsLogged(){
        if (!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']==false){
            header('Location:/portal');
        }
    }
    public static function checkIsAdmin(){
        if (!isset($_SESSION['admin'])||$_SESSION['admin']==0){
            header('Location:/portal');
        }
    }

    public static function check_przedm_name($name){
        if (strlen($name)>30||strlen($name)<=0) {
            $_SESSION['err_nazwa']="Nazwa przedmiotu powinna mieć od 1 do 29 znaków";
            return false;
        }
        else{
            return $name;
        }
    }
    public static function check_przedm_price($price){
        if ($price<=0) {
            $_SESSION['err_cena']="Podana cena musi być liczbą większą od 0";
            return false;
        }
        elseif (is_numeric($price)){//poprawna liczba
            $price = round($price,2);
            return $price;
        }
        else{
            $_SESSION['err_cena']="Podana cena musi być liczbą większą od 0";
            return false;
        }
    }
    public static function check_przedm_number($number){
        if ($number<=0) {
            $_SESSION['err_ilosc']="Ilość musi być liczbą całkowitą większą od 0";
            return false;
        }
        else{
            return $number;
        }
    }

    public static function check_login($login){
        if (strlen($login)>3&&strlen($login)<20){
            if (ctype_alnum($login)){
                $_SESSION['reg_login']=$login;
                return $login;
            }else{
                $_SESSION['err_reg_login']="Login może zawierać znaki od A do Z oraz liczby 0-9";
                return false;
            }
        }else{
            $_SESSION['err_reg_login']="Login musi mieć od 3 do 20 znaków";
            return false;
        }
    }
    public static function check_password($password,$password2){
        if (strlen($password)>5 && strlen($password)<14){
            if ($password==$password2){
                return $password;
            }
            else{
                $_SESSION['err_reg_haslo2']="Podane hasła muszą być jednakowe";
                return false;
            }
        }else{
            $_SESSION['err_reg_haslo']="Hasło musi mieć od 6 do 13 znaków";
            return false;
        }
    }
    public static function check_email($email){
        $emailBezZlychZnakow = filter_var($email, FILTER_SANITIZE_EMAIL);
        if ($email!=$emailBezZlychZnakow||filter_var($email,FILTER_VALIDATE_EMAIL)==false){
            $_SESSION['err_reg_email']="Podano niepoprawny adres E-mail";
            return false;
        }else{
            $_SESSION['reg_email']=$email;
            return $email;
        }
    }



}

