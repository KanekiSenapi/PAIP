<?php

require_once __DIR__ . "/../repository/PublishersRepository.php";
require_once __DIR__ . "/../service/Service.php";

class PublisherService extends Service
{

    public function __construct()
    {
        $this->repository = new PublishersRepository();
    }


}