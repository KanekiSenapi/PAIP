<?php

require_once "src/controller/DefaultController.php";
require_once "src/controller/SecurityController.php";

class Router {
    public static array $routes = [];

    public static function get($url, $view) {
        self::$routes[$url] = $view;
    }

    public static function post($url, $view) {
        self::$routes[$url] = $view;
    }

    public static function run($url) {
        $urlParts = explode("/", $url);
        $action = $urlParts[0];

        if (!array_key_exists($action, self::$routes)) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/home");
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $action = $action ?: 'home';

        $id = $urlParts[1] ?? '';

        $object->$action($id);
    }
}