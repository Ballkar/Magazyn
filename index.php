<?php
require "core/bootstrap.php";
session_start();

$router = router::load('route.php');


require $router->direct(URI::give(), $_SERVER["REQUEST_METHOD"]);

