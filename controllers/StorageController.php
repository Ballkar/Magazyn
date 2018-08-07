<?php
/**
 * Created by PhpStorm.
 * User: Miszczu
 * Date: 2018-07-16
 * Time: 10:45
 */

namespace App\controllers;

use App\core\validator;
use App\core\App;

class StorageController
{
    public function show()
    {
        validator::checkIsLogged();

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
        return view('magazyn', compact('products', 'ile_stron_max'));
    }

    public function add()
    {
        validator::checkIsAdmin();
        $stanMagazynu = 0;


        return view('magazyn-admin', compact('stanMagazynu'));
    }

    public function save()
    {
        validator::checkIsAdmin();
        $stanMagazynu = 0;

        $przedmiot = [
            'name' => validator::check_product_name($_POST['nazwa']),
            'cena' => validator::check_product_price($_POST['cena']),
            'ilosc' => validator::check_product_number($_POST['ilosc']),
            'dzial' => $_POST['dzial']
        ];
        if ($przedmiot['name'] && $przedmiot['cena'] && $przedmiot['ilosc'] && $przedmiot['dzial']) {
            App::get('database')->addProduct('magazyn', $przedmiot);
            $stanMagazynu = 1;
        }

        return view('magazyn-admin', compact('stanMagazynu'));
    }
}
