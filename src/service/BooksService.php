<?php

require_once __DIR__."/../repository/BooksRepository.php";
require_once __DIR__."/../service/Service.php";
require_once __DIR__."/../service/BorrowsService.php";

class BooksService extends Service {
    private BorrowsService $borrowsService;

    public function __construct() {
        $this->repository = new BooksRepository();
        $this->borrowsService = new BorrowsService();
    }

   public function getLightBooksWithQuery($query): array {
       if ($query) {
           return $this->repository->queryLightBooks($query);
       } else {
           return $this->repository->getAllLightBooks();
       }
   }

    public function getBookById($id): ?BookFull {
        return $this->repository->getBookById($id);
    }

    public function addBook($metadataId): int {
        return $this->repository->addBook($metadataId);
    }

    public function getAllFreeBooks(): array {
        return $this->repository->getAllFreeBooks();
    }

    public function deleteByIdDetailed(int $id): int
    {
        if ($this->borrowsService->isBorrowed($id)) {
            return -2;
        } else {
            return $this->deleteById($id) ? 1 : -1;
        }
    }

    public function deleteById(int $id): bool
    {
        if ($this->borrowsService->isBorrowed($id)) {
            return false;
        } else {
            return parent::deleteById($id);
        }
    }

}