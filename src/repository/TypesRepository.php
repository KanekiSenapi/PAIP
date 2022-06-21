<?php

require_once "Repository.php";
require_once __DIR__."/../model/Author.php";

class AuthorRepository extends Repository {

    private static string $SELECT_ALL = "SELECT id, fullname FROM public.book_authors";

    public function getAll(): array {
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare(self::$SELECT_ALL);
        $stmt->execute();

        $authors = $stmt->fetchAll(PDO::FETCH_CLASS, "Author");

        $connection = null;

        return $authors;
    }
}