<?php

namespace App\controllers;

use App\core\Validator;
use App\core\App;

class ProductController
{
    public function edit()
    {
        Validator::checkIsLogged();

        $product = App::get('database')->returnProductFromId('magazyn', $_GET['id']);

        return view('product', compact('product'));
    }

    public function update()
    {
        Validator::checkIsLogged();

        if (isset($_POST['price']) && $price = validator::checkProductPrice($_POST['price'])) {
            App::get('database')->editProduct($_GET['id'], 'price', $price);
        } elseif (isset($_POST['number'])&& $number=validator::checkProductNumber($_POST['number'])) {
            App::get('database')->editProduct($_GET['id'], 'number', $_POST['number']);
        } elseif (isset($_POST['section'])) {
            App::get('database')->editProduct($_GET['id'], 'section', $_POST['section']);
        }

        $product = App::get('database')->returnProductFromId('magazyn', $_GET['id']);

        return view('product', compact('product'));
    }


    public function destroy()
    {
        Validator::checkIsAdmin();

        App::get('database')->deleteProduct($_GET['id']);


        return redirect('magazyn-master/warehouse');
    }
}
