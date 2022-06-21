<?php

require_once __DIR__."/../repository/AuthorRepository.php";

abstract class Service {
    protected Repository $repository;


   public function getAll(): array {
        return $this->repository->getAll();
   }

}