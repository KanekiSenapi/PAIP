<?php

require_once __DIR__."/../repository/BooksRepository.php";
require_once __DIR__."/../service/Service.php";

class BooksService extends Service {
    public function __construct() {
        $this->repository = new BooksRepository();
    }

   public function getAllLightBooks(): array {
        return $this->repository->getAllLightBooks();
   }

    public function getBookById($id): ?BookFull {
        return $this->repository->getBookById($id);
    }

    public function addBook($metadataId): int {
        return $this->repository->addBook($metadataId);
    }

}