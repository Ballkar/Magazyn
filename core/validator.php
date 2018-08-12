<?php

namespace App\core;

class Validator
{
    protected $validationStatus=true;

    public function changeValidationStatus(bool $status)
    {
        $this->validationStatus = $status;
    }

    public function getValidationStatus()
    {
        return $this->validationStatus;
    }

}
