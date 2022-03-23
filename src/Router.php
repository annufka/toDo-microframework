<?php

namespace App;

class Router {
    private $routes = [];
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function dispatch(string $request_uri, string $request_method) {
        if (!empty($this->routes[$request_uri]) && class_exists($this->routes[$request_uri])) {
            $className = $this->routes[$request_uri];
        }
        else {
            $className = \App\Controllers\NotFound::class;
        }
        
        $controller = new $className();
     
        if ($request_method === "GET" && method_exists($controller, "view")) {
            return $controller->view();
        }
        elseif ($request_method === "POST" && method_exists($controller, "submit")) {
            return $controller->submit();
        }
        elseif ($request_method === "PATCH" && method_exists($controller, "edit")) {
            return $controller->edit();
        }
        elseif ($request_method === "DELETE" && method_exists($controller, "delete")) {
            return $controller->delete();
        }
        else {
             return (new \App\Controllers\NotFound)->wrongSubmitMethodError();
        } 
    }
}