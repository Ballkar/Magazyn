<?php


namespace App\core;

class ProductValidator extends SessionValidator
{
    public function checkProductName($name)
    {
        $regularExp = "/^[A-Z|a-z]{1}[A-Z|a-z|0-9]{4,29}$/";
        if (Preg_match($regularExp, $name)) {
            return true;
        } else {
            $this->validationStatus = false;
            return false;
        }
    }

    public function checkProductPrice($price)
    {
        $regularExp = "/^[0-9]+(\.[0-9]{0,99})?$/";
        if (Preg_match($regularExp, $price)) {
            return true;
        } else {
            $this->validationStatus = false;
            return false;
        }
    }

    public function checkProductNumber($number)
    {
        $regularExp = "/^[0-9]+$/";
        if (Preg_match($regularExp, $number)) {
            return true;
        } else {
            $this->validationStatus = false;
            return false;
        }
    }
}
