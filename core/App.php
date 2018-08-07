<?php

namespace App\core;

use Exception;

/**
 * Class App
 * @package App\core
 */
class App
{
    protected static $registry = [];

    /**
     * @param string $key
     * @param $value
     */
    public static function bind(string $key, $value)
    {
        static::$registry[$key] = $value;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public static function get(string $key)
    {
        try {
            if (!array_key_exists($key, static::$registry)) {
                throw new Exception("{$key} Nie istnieje w bazie zależości");
            }
            return static::$registry[$key];
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
