<?php

abstract class Service {
    protected Repository $repository;


   public function getAll(): array {
        return $this->repository->getAll();
   }

    public function deleteById(int $id): bool {
        return $this->repository->deleteById($id);
    }

}