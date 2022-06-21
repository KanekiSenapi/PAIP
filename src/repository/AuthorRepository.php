<?php

require_once "Repository.php";
require_once __DIR__."/../model/Author.php";

class AuthorRepository extends Repository {
    protected string $CLASS = "Author";
    protected string $GET_ALL_FIELDS = "id,fullname";
    protected string $GET_ALL_TABLE = "public.book_authors";
}