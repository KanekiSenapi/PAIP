<?php

require_once "AppController.php";

class BooksController extends AppController {

    public function books() {
        $this->render("books", "Books", [], "user");
    }
}