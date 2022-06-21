<?php

require_once __DIR__ . "/../repository/TypesRepository.php";
require_once __DIR__ . "/../service/Service.php";

class TypesService extends Service
{

    public function __construct()
    {
        $this->repository = new TypesRepository();
    }


}