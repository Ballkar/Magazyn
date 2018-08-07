<?php

namespace App\core;

use Exception;

class Router
{
    protected $route = [
        "GET" => [],
        "POST" => []
    ];

    public static function load($file)
    {
        $router = new static();
        require_once $file;

        return $router;
    }

    public function get($uri, $controller)
    {
        $this->route["GET"][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->route["POST"][$uri] = $controller;
    }

    public function direct($uri, $method)
    {
        try {
            if (array_key_exists($uri, $this->route[$method])) {
                return $this->callAction(
                    ...explode('@', $this->route[$method][$uri])
                );
            } else {
                throw new Exception();
            }
        } catch (Exception $e) {
            die('podany adres nie istnieje');
        }
    }
    protected function callAction($controller, $action)
    {
        $controller = "App\\controllers\\{$controller}";
        $controller = new $controller;
        if (! method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }
        return  (new $controller)->$action();
    }
}
