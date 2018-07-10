<?php

$router->get("magazyn-master","controllers/index.php");
$router->get("magazyn-master/credit","controllers/credit.php");
$router->get("magazyn-master/orders","controllers/orders.php");
$router->get("magazyn-master/edit","controllers/edit.php");
$router->get("magazyn-master/magazyn","controllers/magazyn.php");
$router->post("magazyn-master/magazyn","controllers/magazyn.php");

$router->get("magazyn-master/product","controllers/przedmiot.php");

$router->get("magazyn-master/admin-magazyn","controllers/magazyn-admin.php");
$router->post("magazyn-master/admin-magazyn","controllers/magazyn-admin.php");
$router->post("magazyn-master/login","controllers/login.php");
$router->post("magazyn-master/logout","controllers/logout.php");
$router->get("magazyn-master/rejestracja","controllers/rejestracja.php");
$router->post("magazyn-master/rejestracja","controllers/rejestracja.php");
