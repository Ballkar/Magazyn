<?php
validator::checkIsLogged();

$przedmiot = $query->returnProductFromId('magazyn',$_GET['id']);
var_dump($przedmiot->dzial);
require "view/przedmiot.view.php";

