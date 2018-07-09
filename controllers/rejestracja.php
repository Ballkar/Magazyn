<?php

validator::checkIsNotLogged();

//jeżeli jest wysłany POST sprawdź czy formularz jest poprawnie wypełniony
if (isset($_POST['login'])){
    $login=validator::check_login($_POST['login']);
    $password=validator::check_password($_POST['haslo'],$_POST['haslo2']);
    $email=validator::check_email($_POST['email']);
    if (!isset($_POST['regulamin'])){
        $regulamin= false;
        $_SESSION['err_reg_regulamin']="Należy zapoznac się z regulaminem";
    }else{
        $_SESSION['reg_regulamin']=true;
        $regulamin=true;
    }

//Jeżeli jest poprawnie zacznij sprawdzanie czy nie ma go w bazie danych.
    if ($login&&$password&&$regulamin){
        $LoginBaza = $query->CheckInDataBase('user', ['login'],[$login]);
        if ($LoginBaza==false){
            $_SESSION['err_reg_login']="Podany login jest już w bazie";
        }
        $emailBaza = $query->CheckInDataBase('user', ['email'],[$email]);
        if ($emailBaza==false){
            $_SESSION['err_reg_email']="Podany email jest już w bazie";
        }

        $wszystkoOK=$LoginBaza*$emailBaza;
        if ($wszystkoOK){
            //wyczyść zmienne które służą do zapamiętywania danych z prób rejestracji
            unset($_SESSION['reg_login']);
            unset($_SESSION['reg_email']);
            unset($_SESSION['reg_regulamin']);
            $query->addNewAccount('user',$login,$password,$email);
            $_SESSION['reg_success']="Pomyślnie dodano nowego użytkownika!!!";
        }
    }
}


require "view/rejestracja.view.php";