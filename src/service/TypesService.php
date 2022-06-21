<?php

require_once __DIR__."/../repository/AuthorRepository.php";

class AuthorService {
    private AuthorRepository $authorRepository;

    public function __construct() {
        $this->authorRepository = new AuthorRepository();
    }

   public function getAll(): array {
        return $this->authorRepository->getAll();
   }

}