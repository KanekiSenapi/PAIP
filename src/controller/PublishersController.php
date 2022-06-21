<?php

require_once "AppController.php";
require_once "src/service/PublisherService.php";

class PublishersController extends AppController {

    private PublisherService $service;

    public function __construct() {
        parent::__construct();
        $this->service = new PublisherService();
    }


    public function publishers() {
        if ($this->roleValidate("publishers_view")) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($this->service->getAll());
        } else {
            HeaderUtils::redirectToHome();
        }
    }


}