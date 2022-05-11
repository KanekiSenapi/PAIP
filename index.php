<?php

require_once "Router.php";

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('index', 'DefaultController');
Router::get('login', 'SecurityController');

Router::run($path);