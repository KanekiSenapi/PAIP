<?php

require_once "AppController.php";
require_once "src/service/AuthorService.php";
require_once "src/utils/HeaderUtils.php";

class AuthorsController extends AppController {

    private AuthorService $service;

    public function __construct() {
        parent::__construct();
        $this->service = new AuthorService();
    }


    public function authors() {
        if ($this->roleValidate("authors_view")) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($this->service->getAll());
        } else {
            HeaderUtils::redirectToHome();
        }

    }


}