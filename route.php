<?php

$router->get("magazyn-master", "SessionController@home");

$router->get("magazyn-master/magazyn", "StorageController@show");
$router->post("magazyn-master/magazyn", "StorageController@show");

$router->get("magazyn-master/admin-magazyn", "StorageController@add");

$router->post("magazyn-master/admin-magazyn", "StorageController@save");



$router->get("magazyn-master/przedmiot", "ProductController@edit");

$router->post("magazyn-master/przedmiot", "ProductController@update");

$router->get("magazyn-master/przedmiot/delete", "ProductController@destroy");


$router->post("magazyn-master/login", "SessionController@login");
$router->post("magazyn-master/logout", "SessionController@logout");

$router->get("magazyn-master/rejestracja", "SessionController@register");
$router->post("magazyn-master/rejestracja", "SessionController@store");
