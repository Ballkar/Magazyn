<?php

$router->get("magazyn-master","PageController@home");

$router->get("magazyn-master/magazyn","PageController@storage");
$router->post("magazyn-master/magazyn","PageController@storage");

$router->get("magazyn-master/przedmiot","PageController@product");

$router->get("magazyn-master/admin-magazyn","PageController@storageAdmin");
$router->post("magazyn-master/admin-magazyn","PageController@storageAdmin");

$router->post("magazyn-master/login","sessionController@login");
$router->post("magazyn-master/logout","sessionController@logout");
$router->get("magazyn-master/rejestracja","sessionController@register");
$router->post("magazyn-master/rejestracja","sessionController@register");
