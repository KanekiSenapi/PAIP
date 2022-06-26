<?php

require_once __DIR__ . "/../repository/UserRepository.php";
require_once __DIR__ . "/../service/Service.php";

class UserService extends Service
{

    public function __construct()
    {
        $this->repository = new UserRepository();
    }

}