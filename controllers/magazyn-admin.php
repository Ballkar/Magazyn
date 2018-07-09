<?php
validator::checkIsAdmin();
$stanMagazynu=0;


if (isset( $_POST['dzial'])) {
    $przedmiot=[
        'name' => validator::check_przedm_name($_POST['nazwa']),
        'cena' => validator::check_przedm_price($_POST['cena']),
        'ilosc' => validator::check_przedm_number($_POST['ilosc']),
        'dzial' => $_POST['dzial']
        ];
    if ($przedmiot['name']&&$przedmiot['cena']&&$przedmiot['ilosc']&&$przedmiot['dzial']){
        $query->addProduct('magazyn', $przedmiot);
        $stanMagazynu=1;
    }
}


require "view/magazyn-admin.view.php";