<?php

require_once "AppController.php";
require_once "src/service/BorrowsService.php";
require_once "src/utils/HeaderUtils.php";

class BorrowsController extends AppController {

    private BorrowsService $service;

    public function __construct() {
        parent::__construct();
        $this->service = new BorrowsService();
    }


    public function borrows($part) {
        if (is_numeric($part)) {
            $this->borrow($part);
        } else {
            if ($this->isGet() && $this->roleValidate("borrows_view")) {
                $borrows = $this->service->getAllLight();
                $this->render("borrows", "Borrows", ['borrows' => $borrows], "borrows_view");
            } else if ($this->isPost() && $this->roleValidate("borrows_create")) {
                $id = $this->service->borrow($_POST);
                if ($id == -1) {
                    HeaderUtils::redirectTo("borrowForm?message=Book already borrowed.");
                } else {
                    HeaderUtils::redirectTo("borrows/{$id}");
                }
            } else {
                HeaderUtils::redirectToHome();
            }
        }
    }

    public function borrow($id) {
        if ($this->isGet() && $this->roleValidate("borrows_view")) {
            $borrow = $this->service->getById($id);
            if ($borrow) {
                $this->render("borrow", "Borrow", array_merge($_GET, ["borrow" => $borrow]), "borrows_view");
            } else {
                $this->render("404", "Not Found", [], "");
            }
        } else if($this->isPatch()) {
            if ($this->service->returnBook($id)) {
                header("HTTP/1.1 200 OK");
            } else {
                header("HTTP/1.1 400 Bad Request");
            }
        } else if ($this->isDelete()) {
            if ($this->service->deleteById($id)) {
                header("HTTP/1.1 200 OK");
            } else {
                header("HTTP/1.1 400 Bad Request");
            }
        } else {
            HeaderUtils::redirectToHome();
        }
    }

    public function borrowForm() {
        if ($this->isGet()) {
            $this->render("borrowForm", "Borrow", $_GET, "borrows_create");
        } else {
            HeaderUtils::redirectToHome();
        }
    }

}