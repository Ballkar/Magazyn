<?php
$config = require_once "config.php";    //Dane bazy itp.

$pdo = connector::create($config["database"]);

$query = new querybuilder($pdo);

