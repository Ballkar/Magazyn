<?php

use App\core\App;

$router->get(App::get('config')['App']['AppName'], "SessionController@home");

$router->get(App::get('config')['App']['AppName']."/warehouse", "StorageController@show");
$router->post(App::get('config')['App']['AppName']."/warehouse", "StorageController@show");

$router->get(App::get('config')['App']['AppName']."/admin-warehouse", "StorageController@add");

$router->post(App::get('config')['App']['AppName']."/admin-warehouse", "StorageController@save");


$router->get(App::get('config')['App']['AppName']."/product", "ProductController@edit");

$router->post(App::get('config')['App']['AppName']."/product", "ProductController@update");

$router->get(App::get('config')['App']['AppName']."/product/delete", "ProductController@destroy");


$router->post(App::get('config')['App']['AppName']."/login", "SessionController@login");
$router->post(App::get('config')['App']['AppName']."/logout", "SessionController@logout");

$router->get(App::get('config')['App']['AppName']."/register", "SessionController@register");
$router->post(App::get('config')['App']['AppName']."/register", "SessionController@store");
