<?php

require_once __DIR__ . "/../repository/BorrowsRepository.php";
require_once __DIR__ . "/../service/Service.php";
require_once __DIR__ . "/../model/borrows/BorrowFull.php";

class BorrowsService extends Service
{
    private int $defaultBorrowTime = 2629743;

    public function __construct()
    {
        $this->repository = new BorrowsRepository();
    }

    public function getAllLight(): array {
        return $this->repository->getAllLight();
    }

    public function getById($id): ?BorrowFull {
        return $this->repository->getById($id);
    }

    public function borrow($body): int {
        if ($this->repository->isBorrowed($body['bookId'])) {
            return -1;
        }
        $body['returnOn'] = $this->prepareReturnOn();
        return $this->repository->insert($body);
    }

    public function returnBook($borrowId): int {
        return $this->repository->updateBookReturned($borrowId);
    }

    public function getForBook($bid): array {
        return $this->repository->getByBookId($bid);
    }

    private function prepareReturnOn(): int {
        $date = new DateTime();
        $now = $date->getTimestamp();
        return $now + $this->defaultBorrowTime;
    }

}