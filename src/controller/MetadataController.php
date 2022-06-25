<?php

require_once "AppController.php";
require_once "src/service/MetadataService.php";
require_once "src/utils/HeaderUtils.php";

class MetadataController extends AppController {

    private MetadataService $service;

    public function __construct() {
        parent::__construct();
        $this->service = new MetadataService();
    }


    public function metadata() {
        if ($this->isGet() && $this->roleValidate("books_view")) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($this->service->getAll());
        } else if ($this->isPost() && $this->roleValidate("books_create")) {
            $bookId = $this->service->createNewMetadataBook($_POST);
            if ($bookId == -1) {
                HeaderUtils::redirectTo("metadataForm?message=ISBN already used.");
            } else {
                HeaderUtils::redirectTo("metadataForm?message=Created");
            }
        } else {
            HeaderUtils::redirectToHome();
        }
    }

    public function metadataForm() {
        if ($this->isGet()) {
            $this->render("metadataForm", "Book Metadata Creation", $_GET, "books_create");
        } else {
            HeaderUtils::redirectToHome();
        }
    }
}