<?php
validator::checkIsLogged();

$przedmiot = App::get('database')->returnProductFromId('magazyn',$_GET['id']);
var_dump($przedmiot->dzial);
require "view/przedmiot.view.php";

