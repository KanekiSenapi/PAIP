<?php

require_once "Repository.php";
require_once __DIR__."/../model/Type.php";

class TypesRepository extends Repository {
    protected string $GET_ALL_FIELDS = "id,name";
    protected string $GET_ALL_TABLE = "public.book_types";

}