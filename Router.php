<?php

require_once "src/controller/DefaultController.php";
require_once "src/controller/SecurityController.php";

require_once "src/controller/BooksController.php";
require_once "src/controller/AuthorsController.php";
require_once "src/controller/TypesController.php";
require_once "src/controller/PublishersController.php";
require_once "src/utils/HeaderUtils.php";

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
            HeaderUtils::redirectToHome();
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $action = $action ?: 'home';

        $id = $urlParts[1] ?? '';

        $object->$action($id);
    }
}