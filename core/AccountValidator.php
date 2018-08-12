<?php


namespace App\core;

class AccountValidator extends Validator
{
    public function checkLogin($login)
    {
        $regularExp = "/^[A-Z|a-z]{1}[A-Z|a-z|0-9]{4,19}$/";
        if (Preg_match($regularExp, $login)) {
            return true;
        } else {
            $this->validationStatus=false;
            return false;
        }
    }

    public function checkPassword($password)
    {
        $regularExp = "/^.{6,}$/";
        if (Preg_match($regularExp, $password)) {
            return true;
        } else {
            $this->validationStatus=false;
            return false;
        }
    }

    public function checkEmail($email)
    {
        $emailClear = filter_var($email, FILTER_SANITIZE_EMAIL);
        if ($email !== $emailClear || filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $this->validationStatus=false;
            return false;
        } else {
            return true;
        }
    }
}