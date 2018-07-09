<?php
validator::checkIsLogged();

//rekody ile wyświetlić na strone
if (isset($_POST['howMuch'])){
    $_SESSION['howMuch']=$_POST['howMuch'];
} elseif(!isset($_SESSION['howMuch'])) {
    $_SESSION['howMuch']=5;
}



if (!isset($_GET['strona'])) {
    $_GET['strona']=1;
}
$ile_rekord_pominac=($_GET['strona']-1)*$_SESSION['howMuch'];

if(isset($_POST['wyszukaj'])){
    $_SESSION['query'] = $_POST['wyszukaj'];
}

if (isset($_SESSION['query'])){
    $wynik = $query->findProduct("magazyn","nazwa_przedmiotu,cena,ilosc", $ile_rekord_pominac, $_SESSION['howMuch'],$_SESSION['query']);
}else{
    $wynik = $query->selectProduct("magazyn","nazwa_przedmiotu,cena,ilosc", $ile_rekord_pominac, $_SESSION['howMuch']);
}

$ile_stron_max = ceil($wynik['ile_wynikow']/$_SESSION['howMuch']);

require "view/magazyn.view.php";

echo "<script src='js/deletebutton.js'></script>";
