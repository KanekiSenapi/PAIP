<?php

require_once "AppController.php";
require_once "src/service/BooksService.php";

class BooksController extends AppController {

    private BooksService $service;

    public function __construct() {
        parent::__construct();
        $this->service = new BooksService();
    }

    public function books($part) {
        if (is_numeric($part)) {
            $this->book($part);
        } else {
            if ($this->isGet() && $this->roleValidate("books_view")) {
                $books = $this->service->getAllLightBooks();
                $this->render("books", "Books", ['books' => $books], "books_view");
            } else if ($this->isPost() && $this->roleValidate("books_create")) {
                $bookId = $this->service->addBook($_POST['metadataId']);
                HeaderUtils::redirectTo("books/{$bookId}");
            } else {
                HeaderUtils::redirectToHome();
            }


        }
    }

    public function book($id) {
        if ($this->isGet() && $this->roleValidate("books_view")) {
            $book = $this->service->getBookById($id);
            if ($book) {
                $this->render("book", "Book", array_merge($_GET, ["book" => $book]), "books_view");
            } else {
                $this->render("404", "Not Found", [], "");
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

    public function bookForm() {
        if ($this->isGet()) {
            $this->render("bookForm", "Book Creation", [], "books_create");
        } else {
            HeaderUtils::redirectToHome();
        }
    }

    public function booksFree() {
        if ($this->isGet()) {
            if ($this->roleValidate("books_view")) {
                header('Content-Type: application/json; charset=utf-8');
                echo json_encode($this->service->getAllFreeBooks());
            } else {
                HeaderUtils::redirectToHome();
            }
        } else {
            HeaderUtils::redirectToHome();
        }
    }


}