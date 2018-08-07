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
        if (isset($_POST['cena']) && $cena = validator::check_product_price($_POST['cena'])) {
            App::get('database')->editProduct($_GET['id'], 'cena', $cena);
        } elseif (isset($_POST['ilosc'])&& $ilosc=validator::check_product_number($_POST['ilosc'])) {
            App::get('database')->editProduct($_GET['id'], 'ilosc', $_POST['ilosc']);
        } elseif (isset($_POST['dzial'])) {
            App::get('database')->editProduct($_GET['id'], 'dzial', $_POST['dzial']);
        }

        $product = App::get('database')->returnProductFromId('magazyn', $_GET['id']);

        return view('product', compact('product'));
    }


    public function destroy()
    {
        Validator::checkIsAdmin();

        App::get('database')->deleteProduct($_GET['id']);


        return redirect('magazyn-master/magazyn');
    }
}
