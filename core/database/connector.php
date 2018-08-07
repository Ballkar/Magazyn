<?php

namespace App\core\database;

use PDO;
use PDOException;

class Connector
{
    public static function create($config)
    {
        try {
            return new PDO(
                $config["dsn"] . "; dbname=" . $config["dbname"] . ";charset=" . $config["charset"],
                $config["user"],
                $config["password"],
                $config["option"]
            );
        } catch (PDOException $e) {
            die("error:" . $e->getMessage());
        }
    }
}
