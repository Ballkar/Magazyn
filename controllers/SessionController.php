<?php

namespace App\controllers;

use App\core\AccountValidator;
use App\core\SessionValidator;
use App\core\App;

class SessionController
{
    public function home()
    {
        return view('index');
    }

    public function login()
    {
        if (App::get('database')->checkIfAccountExist($_POST['login'], $_POST['password'])) {
            App::get('database')->logUser($_POST["login"], $_POST["password"]);
        } else {
            $_SESSION['errorLog'] = "Podano złe dane";
        }

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
        SessionValidator::checkIsNotLogged();

        return view('register');
    }

    public function store()
    {
        SessionValidator::checkIsNotLogged();

        $validator = new AccountValidator();

        $login = $_POST['login'];
        if ($validator->checkLogin($login)) {
            $_SESSION['registrationLogin'] = $login;
            $loginDatabaseCheck = App::get('database')->CheckInDatabase(['login'], [$login]);
            if ($loginDatabaseCheck == false) {
                $_SESSION['errorLogin'] = "Podany login jest już w bazie";
                $validator->changeValidationStatus(false);
            }
        } else {
            $_SESSION['errorLogin'] = "Login powinien zawierać od 5 do 20 znaków alfanumerycznych zaczynajac od litery";
        }

        $password = $_POST['password'];
        if ($validator->checkPassword($password)) {
            $passwordConfirmation = $_POST['passwordConfirmation'];
            if ($password !== $passwordConfirmation) {
                $_SESSION['errorPasswordConfirmation'] = "Podane hasla nie pasują";
                $validator->changeValidationStatus(false);
            }
        } else {
            $_SESSION['errorPassword'] = "Hasło powinno zawierać od 6 do 20 znaków alfanumerycznych";
        }


        $email = $_POST['email'];
        if ($validator->checkEmail($email)) {
            $_SESSION['registrationEmail'] = $email;
            $emailDatabaseCheck = App::get('database')->CheckInDatabase(['email'], [$email]);
            if ($emailDatabaseCheck == false) {
                $_SESSION['errorEmail'] = "Podany email jest już w bazie";
                $validator->changeValidationStatus(false);
            }
        } else {
            $_SESSION['errorEmail'] = "Niepoprawny adres email";
        }


        if (!isset($_POST['section'])) {
            $_SESSION['errorSection'] = "Należy zapoznac się z regulaminem";
            $validator->changeValidationStatus(false);
        } else {
            $_SESSION['registrationSection'] = true;
        }


        if ($validator->getValidationStatus()) {
            //wyczyść zmienne które służą do zapamiętywania danych z prób rejestracji
            unset($_SESSION['registrationLogin']);
            unset($_SESSION['registrationEmail']);
            unset($_SESSION['registrationSection']);

            App::get('database')->addNewAccount($login, password_hash($password, PASSWORD_DEFAULT), $email);

            return redirect(App::get('config')['App']['AppName']);
        }


        return redirect(App::get('config')['App']['AppName'] . '/register');
    }
}
