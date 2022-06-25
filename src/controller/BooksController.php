<?php

require_once "AppController.php";
require_once "src/service/BooksService.php";

class BooksController extends AppController {

    private BooksService $booksService;

    public function __construct() {
        parent::__construct();
        $this->booksService = new BooksService();
    }

    public function books($part) {
        if (is_numeric($part)) {
            $this->book($part);
        } else {
            if ($this->isGet()) {
                $books = $this->booksService->getAllLightBooks();
                $this->render("books", "Books", ['books' => $books], "books_view");
            } else if ($this->isPost() && $this->roleValidate("books_create")) {
                $bookId = $this->booksService->addBook($_POST['metadataId']);
                HeaderUtils::redirectTo("books/{$bookId}");
            } else {
                HeaderUtils::redirectToHome();
            }


        }
    }

    public function book($id) {
        if ($this->isGet() && $this->roleValidate("books_view")) {
            $book = $this->booksService->getBookById($id);
            if ($book) {
                $this->render("book", "Book", array_merge($_GET, ["book" => $book]), "books_view");
            } else {
                $this->render("404", "Not Found", [], "");
            }
        } else if ($this->isDelete()) {
            if ($this->booksService->deleteById($id)) {
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


}