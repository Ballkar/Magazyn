<?php

namespace App\core;

class URI
{
    public static function give()
    {
        return parse_url(trim($_SERVER["REQUEST_URI"], "/"), PHP_URL_PATH);
    }
}
