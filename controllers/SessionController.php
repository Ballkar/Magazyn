<?php

namespace App\controllers;

use App\core\Validator;
use App\core\App;

class SessionController
{
    public function home()
    {
        return view('index');
    }

    public function login()
    {
        App::get('database')->logUser($_POST["login"], $_POST["password"]);

        return view('index');
    }

    public function logout()
    {


        if (isset($_SESSION['logged']) && $_SESSION["logged"] = true) {
            unset($_SESSION['logged']);
            unset($_SESSION['admin']);
            session_destroy();
        }

        return redirect(App::get('config')['App']['AppName']);
    }

    public function register()
    {
        Validator::checkIsNotLogged();

        return view('register');
    }

    public function store()
    {
        Validator::checkIsNotLogged();

        $login = Validator::checkLogin($_POST['login']);
        $password = Validator::checkPassword($_POST['haslo'], $_POST['haslo2']);
        $email = Validator::checkEmail($_POST['email']);
        if (!isset($_POST['regulamin'])) {
            $regulamin = false;
            $_SESSION['err_reg_regulamin'] = "Należy zapoznac się z regulaminem";
        } else {
            $_SESSION['reg_regulamin'] = true;
            $regulamin = true;
        }

        //Jeżeli jest poprawnie zacznij sprawdzanie czy nie ma go w bazie danych.
        if ($login && $password && $regulamin) {
            $LoginBaza = App::get('database')->CheckInDataBase('user', ['login'], [$login]);
            if ($LoginBaza == false) {
                $_SESSION['err_reg_login'] = "Podany login jest już w bazie";
            }
            $emailBaza = App::get('database')->CheckInDataBase('user', ['email'], [$email]);
            if ($emailBaza == false) {
                $_SESSION['err_reg_email'] = "Podany email jest już w bazie";
            }

            $wszystkoOK = $LoginBaza * $emailBaza;
            if ($wszystkoOK) {
                //wyczyść zmienne które służą do zapamiętywania danych z prób rejestracji
                unset($_SESSION['reg_login']);
                unset($_SESSION['reg_email']);
                unset($_SESSION['reg_regulamin']);
                App::get('database')->addNewAccount('user', $login, $password, $email);

                return redirect(App::get('config')['App']['AppName']);
            }
        }
        return redirect(App::get('config')['App']['AppName'].'/rejestracja');
    }
}
