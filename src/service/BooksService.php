<?php

require_once __DIR__."/../repository/BooksRepository.php";

class BooksService {
    private BooksRepository $booksRepository;

    public function __construct() {
        $this->booksRepository = new BooksRepository();
    }

   public function getAllLightBooks(): array {
        return $this->booksRepository->getAllLightBooks();
   }

    public function getBookById($id): BookFull {
        return $this->booksRepository->getBookById($id);
    }

    public function createNewBook($body): int {
        //check ISBN already used
        return $this->booksRepository->createNewBookMetadata($body);
    }

}