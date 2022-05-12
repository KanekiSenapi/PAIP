<?php

require_once "Router.php";

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('home', 'DefaultController');\

Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');
Router::post('roles', 'SecurityController');

Router::run($path);