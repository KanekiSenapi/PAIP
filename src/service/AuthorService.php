<?php

require_once __DIR__ . "/../repository/AuthorRepository.php";
require_once __DIR__ . "/../service/Service.php";

class AuthorService extends Service
{

    public function __construct()
    {
        $this->repository = new AuthorRepository();
    }

}