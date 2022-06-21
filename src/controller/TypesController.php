<?php

require_once "AppController.php";
require_once "src/service/AuthorService.php";

class AuthorsController extends AppController {

    private AuthorService $authorService;

    public function __construct() {
        parent::__construct();
        $this->authorService = new AuthorService();
    }


    public function authors() {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($this->authorService->getAll());
    }


}