<?php

$router->get("magazyn-master","sessionController@home");

$router->get("magazyn-master/magazyn","StorageController@show");
$router->post("magazyn-master/magazyn","StorageController@show");

$router->get("magazyn-master/admin-magazyn","StorageController@add");

$router->post("magazyn-master/admin-magazyn","StorageController@save");



$router->get("magazyn-master/przedmiot","ProductController@product");


$router->post("magazyn-master/login","sessionController@login");
$router->post("magazyn-master/logout","sessionController@logout");

$router->get("magazyn-master/rejestracja","sessionController@register");
$router->post("magazyn-master/rejestracja","sessionController@store");
