<?php

namespace App\controllers;

use App\core\Validator;
use App\core\App;

class StorageController
{
    public function show()
    {
        Validator::checkIsLogged();

        //rekody ile wyświetlić na strone
        if (isset($_POST['howMuch'])) {
            $_SESSION['howMuch'] = $_POST['howMuch'];
        } elseif (!isset($_SESSION['howMuch'])) {
            $_SESSION['howMuch'] = 5;
        }

        if (!isset($_GET['strona'])) {
            $_GET['strona'] = 1;
        }

        $ile_rekord_pominac = ($_GET['strona'] - 1) * $_SESSION['howMuch'];
        $ile_przedmiotow = App::get('database')->countProduct('magazyn');

        $products = App::get('database')->selectProducts("magazyn", $ile_rekord_pominac, $_SESSION['howMuch']);

        $ile_stron_max = ceil($ile_przedmiotow / $_SESSION['howMuch']);


        echo "<script src='js/magazyn.js'></script>";
        return view('warehouse', compact('products', 'ile_stron_max'));
    }

    public function add()
    {
        Validator::checkIsAdmin();
        $stanMagazynu = 0;


        return view('warehouse-admin', compact('stanMagazynu'));
    }

    public function save()
    {
        Validator::checkIsAdmin();
        $stanMagazynu = 0;

        $przedmiot = [
            'name' => Validator::checkProductName($_POST['nazwa']),
            'cena' => Validator::checkProductPrice($_POST['cena']),
            'ilosc' => Validator::checkProductNumber($_POST['ilosc']),
            'dzial' => $_POST['dzial']
        ];
        if ($przedmiot['name'] && $przedmiot['cena'] && $przedmiot['ilosc'] && $przedmiot['dzial']) {
            App::get('database')->addProduct('magazyn', $przedmiot);
            $stanMagazynu = 1;
        }

        return view('warehouse-admin', compact('stanMagazynu'));
    }
}
