<?php

require_once __DIR__ . "/../repository/MetadataRepository.php";
require_once __DIR__ . "/../service/Service.php";

class MetadataService extends Service
{

    public function __construct()
    {
        $this->repository = new MetadataRepository();
    }

    public function createNewMetadataBook($body): int {
        if ($this->repository->existByIsbn($body['isbn'])) {
            return -1;
        }
        return $this->repository->createNewBookMetadata($body);
    }

}