<?php
/**
 * Created by PhpStorm.
 * User: Miszczu
 * Date: 2018-03-22
 * Time: 18:13
 */

class router
{
    protected $route=[
        "GET"=>[],
        "POST"=>[]
    ];

    public static function load($file)
    {
        $router = new static();
        require_once $file;

        return $router;
    }

    public function get($uri,$controller){
        $this->route["GET"][$uri]=$controller;
    }

    public function post($uri,$controller){
        $this->route["POST"][$uri]=$controller;
    }

    public function direct($uri,$method){
    try {
        if (array_key_exists($uri, $this->route[$method])) {
            return $this->route[$method][$uri];
        }else{
            throw new Exception();
        }
    }catch(Exception $e){
        die("Nie ma takiego adresu URI");
    }

    }
}