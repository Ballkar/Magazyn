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

        $product = [
            'name' => ProductValidator::checkProductName($_POST['productName']),
            'price' => ProductValidator::checkProductPrice($_POST['price']),
            'number' => ProductValidator::checkProductNumber($_POST['number']),
            'section' => $_POST['section']
        ];
        if ($product['name'] && $product['price'] && $product['number'] && $product['section']) {
            App::get('database')->addProduct($product);
            $storageStatus = 1;
        }

        return view('warehouse-admin', compact('storageStatus'));
    }
}
