<?php
/**
 * Created by PhpStorm.
 * User: Miszczu
 * Date: 2018-07-13
 * Time: 13:02
 */

namespace App\controllers;

use App\core\validator;
use App\core\App;

class ProductController
{
    public function edit()
    {
        validator::checkIsLogged();

        $product = App::get('database')->returnProductFromId('magazyn', $_GET['id']);

        return view('product', compact('product'));
    }

    public function update()
    {
        validator::checkIsLogged();
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
        validator::checkIsAdmin();

        App::get('database')->deleteProduct($_GET['id']);


        return redirect('magazyn-master/magazyn');
    }
}
