<?php
/**
 * Created by PhpStorm.
 * User: Miszczu
 * Date: 2018-07-13
 * Time: 12:46
 */

class App
{
    protected static $registry = [];

    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }
    public static function get($key)
    {
        if (! array_key_exists($key, static::$registry)) {
            throw new Exception("{$key} Nie istnieje w bazie zależości");
        }
        return static::$registry[$key];
    }
}