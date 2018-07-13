<?php
validator::checkIsLogged();

$wynik = $query->returnProductFromId('magazyn',$_GET['id']);
var_dump($wynik);
require "view/przedmiot.view.php";

