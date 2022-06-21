<?php

require_once "Repository.php";
require_once __DIR__."/../model/Publisher.php";

class PublishersRepository extends Repository {
    protected string $CLASS = "Publisher";
    protected string $GET_ALL_FIELDS = "id,name";
    protected string $GET_ALL_TABLE = "public.book_publisher";

}