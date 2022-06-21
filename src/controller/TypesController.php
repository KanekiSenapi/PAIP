<?php

require_once "AppController.php";
require_once "src/service/TypesService.php";

class TypesController extends AppController {

    private TypesService $service;

    public function __construct() {
        parent::__construct();
        $this->service = new TypesService();
    }


    public function types() {
        if ($this->roleValidate("types_view")) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($this->service->getAll());
        } else {
            HeaderUtils::redirectToHome();
        }
    }


}