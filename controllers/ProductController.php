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



    public function product()
    {
        validator::checkIsLogged();

        $przedmiot = App::get('database')->returnProductFromId('magazyn',$_GET['id']);



        return view('product', compact('przedmiot'));
    }
}
