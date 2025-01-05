<?php

namespace App;


class Router
{
    private   $routes = [];

    public function addRoute($method,$path,$controller,$action) {
        $this->routes[] = [
            "method" => $method ,
            "path" => $path,
            "controller" => $controller,
            "action" => $action
        ];
    }

    public function  dispatch() {
        $method = $_SERVER["REQUEST_METHOD"];
        $path = $_GET["action"] ?? "index";
        
        foreach($this->routes as $route){
            if($route["method"] === $method && $route["path"] === $path){
                $controller = new $route["controller"]() ;
                call_user_func([$controller , $route["action"]]);
                return ;
            }
        }
        http_response_code(404);
        echo "404 Not Found";
    }
}