<?php

namespace App\controllers;

use App\core\SessionValidator;
use App\core\ProductValidator;
use App\core\App;

class ProductController
{
    public function edit()
    {
        SessionValidator::checkIsLogged();

        $product = App::get('database')
            ->returnProductFromId($_GET['id']);

        return view('product', compact('product'));
    }

    public function update()
    {
        SessionValidator::checkIsLogged();

        if (isset($_POST['price']) && $price = ProductValidator::checkProductPrice($_POST['price'])) {
            App::get('database')->editProduct($_GET['id'], 'price', $price);
        } elseif (isset($_POST['number']) && $number = ProductValidator::checkProductNumber($_POST['number'])) {
            App::get('database')->editProduct($_GET['id'], 'number', $_POST['number']);
        } elseif (isset($_POST['section'])) {
            App::get('database')->editProduct($_GET['id'], 'section', $_POST['section']);
        }

        $product = App::get('database')->returnProductFromId($_GET['id']);

        return view('product', compact('product'));
    }


    public function destroy()
    {
        SessionValidator::checkIsAdmin();

        App::get('database')->deleteProduct($_GET['id']);


        return redirect('magazyn-master/warehouse');
    }
}
