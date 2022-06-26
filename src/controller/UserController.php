<?php

require_once "AppController.php";
require_once "src/service/UserService.php";
require_once "src/utils/HeaderUtils.php";

class UserController extends AppController {

    private UserService $service;

    public function __construct() {
        parent::__construct();
        $this->service = new UserService();
    }


    public function usersList() {
        if ($this->roleValidate("users_view")) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($this->service->getAll());
        } else {
            HeaderUtils::redirectToHome();
        }
    }


}