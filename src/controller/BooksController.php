<?php

require_once "AppController.php";
require_once "src/service/BooksService.php";

class BooksController extends AppController {

    private BooksService $service;

    public function __construct() {
        parent::__construct();
        $this->service = new BooksService();
    }

    public function books() {
        if ($this->isGet() && $this->roleValidate("books_view")) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($this->service->getLightBooksWithQuery($_GET['query']));
        } else if ($this->isPost() && $this->roleValidate("books_create")) {
            $bookId = $this->service->addBook($_POST['metadataId']);
            if ($bookId > 0) {
                header("HTTP/1.1 200 OK");
                HeaderUtils::redirectTo("booksView/{$bookId}");
            } else {
                header("HTTP/1.1 401 Bad Request");
                HeaderUtils::redirectTo("bookForm");
            }
        } else {
            HeaderUtils::redirectToHome();
        }
    }

    public function booksView($rest) {
        if (is_numeric($rest)) {
            $this->book($rest);
        } else {
            if ($this->isGet() && $this->roleValidate("books_view")) {
                $this->render("books", "Books", [], "books_view");
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
            $deleteById = $this->service->deleteByIdDetailed($id);
            if ($deleteById == 1) {
                header("HTTP/1.1 200 OK");
            } else if ($deleteById == -2){
                header("HTTP/1.1 409 Conflict");
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