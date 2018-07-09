<?php

require_once "core/router.php"; //definiowanie ścieżek
require_once "core/URI.php";    //zwraca żadany adres bez /
require_once "database/connect.php";    //polącz PDO
$config = require_once "config.php";    //Dane bazy itp.
require_once "core/validator.php";
require_once "core/message.php";
require_once "core/database/querybuilder.php";
require_once "core/database/przedmiot.php";
require_once "core/navigator.php";
$pdo = connector::create($config["database"]);
$query = new querybuilder($pdo);

