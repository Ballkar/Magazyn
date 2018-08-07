<?php
require 'vendor/autoload.php';
require "core/bootstrap.php";
require_once "core/helpers.php";


use App\core\router;
use App\core\URI;

session_start();

$router = router::load('route.php');

$router->direct(URI::give(), $_SERVER["REQUEST_METHOD"]);
