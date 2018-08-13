<?php

namespace App\controllers;

use App\core\SessionValidator;
use App\core\ProductValidator;
use App\core\App;

class StorageController
{
    public function show()
    {
        SessionValidator::checkIsLogged();

        //rekody ile wyświetlić na strone
        if (isset($_POST['recordsPerPage'])) {
            $_SESSION['recordsPerPage'] = $_POST['recordsPerPage'];
        } elseif (!isset($_SESSION['recordsPerPage'])) {
            $_SESSION['recordsPerPage'] = 5;
        }

        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }

        $howManyRecordsSkip = ($_GET['page'] - 1) * $_SESSION['recordsPerPage'];
        $howManyProductsInDatabase = App::get('database')->countProduct();

        $products = App::get('database')->selectProducts(
            App::get('config')['database']['storageTable'],
            $howManyRecordsSkip,
            $_SESSION['recordsPerPage']
        );

        $howManyPagesMax = ceil($howManyProductsInDatabase / $_SESSION['recordsPerPage']);


        echo "<script src='js/magazyn.js'></script>";
        return view('warehouse', compact('products', 'howManyPagesMax'));
    }

    public function add()
    {
        SessionValidator::checkIsAdmin();
        $storageStatus = 0;


        return view('warehouse-admin', compact('storageStatus'));
    }

    public function save()
    {
        SessionValidator::checkIsAdmin();
        $storageStatus = 0;

        $validator = new ProductValidator();

        if ($validator->checkProductName($_POST['productName'])) {
            $_SESSION['valueProductName'] = $_POST['productName'];
        } else {
            $_SESSION['errorProductName'] = "Nazwa przedmiotu powinna mieć od 5 do 29 znaków";
        }

        if ($validator->checkProductPrice($_POST['price'])) {
            $_SESSION['valueProductPrice'] = $_POST['price'];
            $_POST['price'] = round($_POST['price'], 2);
        } else {
            $_SESSION['errorPrice'] = "Podana cena musi być liczbą większą od 0";
        }
        if ($validator->checkProductNumber($_POST['number'])) {
            $_SESSION['valueProductNumber'] = $_POST['number'];
        } else {
            $_SESSION['errorNumber'] = "Ilość musi być liczbą całkowitą większą od 0";
        }

        if ($validator->getValidationStatus() && $_POST['section']) {
            unset($_SESSION['valueProductName']);
            unset($_SESSION['valueProductPrice']);
            unset($_SESSION['valueProductNumber']);
            App::get('database')->addProduct($_POST);
            $storageStatus = 1;
        }

        return view('warehouse-admin', compact('storageStatus'));
    }
}
