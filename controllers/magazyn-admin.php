<?php
validator::checkIsAdmin();
$stanMagazynu=0;


if (isset( $_POST['dzial'])) {
    $przedmiot=[
        'name' => validator::check_product_name($_POST['nazwa']),
        'cena' => validator::check_product_price($_POST['cena']),
        'ilosc' => validator::check_product_number($_POST['ilosc']),
        'dzial' => $_POST['dzial']
        ];
    if ($przedmiot['name']&&$przedmiot['cena']&&$przedmiot['ilosc']&&$przedmiot['dzial']){
        App::get('database')->addProduct('magazyn', $przedmiot);
        $stanMagazynu=1;
    }
}


require "view/magazyn-admin.view.php";