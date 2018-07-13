<?php
require 'vendor/autoload.php';
require "core/bootstrap.php";
require_once "core/helpers.php";

session_start();

$router = router::load('route.php');

$router->direct(URI::give(), $_SERVER["REQUEST_METHOD"]);

