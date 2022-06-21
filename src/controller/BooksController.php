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
            $books = $this->booksService->getAllLightBooks();
            $this->render("books", "Books", ['books' => $books], "books_view");
        }
    }

    public function book($id) {
        $book = $this->booksService->getBookById($id);
        if (!$book) {
            $this->render("404", "Not Found",[], "");
            return;
        }
        $this->render("book", "Book", ["book" => $book], "books_view");
    }

    public function bookCreate() {
        if ($this->isPost()) {
            $bookId = $this->booksService->createNewBook($_POST);
            HeaderUtils::redirectTo("bookCreate/{$bookId}");
            return;
        }
        $this->render("bookCreate", "Book Creation", [], "books_create");
    }


}