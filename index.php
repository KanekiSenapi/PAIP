<?php

require_once "Router.php";

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('home', 'DefaultController');

#PHP View
Router::get('books', 'BooksController');
Router::get('borrows', 'BorrowsController');

#Form
Router::get('metadataForm', 'MetadataController');
Router::get('bookForm', 'BooksController');
Router::get('borrowForm', 'BorrowsController');

#JSON
Router::get('authors', 'AuthorsController');
Router::get('types', 'TypesController');
Router::get('publishers', 'PublishersController');
Router::get('metadata', 'MetadataController');
Router::get('booksFree', 'BooksController');
Router::get('usersList', 'UserController');
Router::get('borrowHistory', 'BorrowsController');

#Security
Router::get('sessionValidity', 'SecurityController');

Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');
Router::post('logout', 'SecurityController');
Router::post('roles', 'SecurityController');


Router::run($path);