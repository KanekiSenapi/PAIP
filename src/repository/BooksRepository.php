<?php

require_once "Repository.php";
require_once __DIR__."/../model/BookLight.php";
require_once __DIR__."/../model/BookFull.php";

class BooksRepository extends Repository {

    private static string $SELECT_ALL_LIGHT_BOOKS = '
        SELECT
            b.id as id,
            bm.title as title,
            string_agg(ba.fullname, \', \') as authors
        FROM
            books b
                INNER JOIN book_metadata bm on bm.id = b."metadataId"
                INNER JOIN book_metadata_authors bma on bm.id = bma."metadataId"
                INNER JOIN book_authors ba on ba.id = bma."authorId"
        GROUP BY
            b.id, bm.title;
    ';

    private static string $SELECT_BOOK_BY_ID = '
        SELECT
            b.id as id,
            bm.isbn as isbn,
            bm.title as title,
            string_agg(ba.fullname, \', \') as authors,
            bm.description as description,
            bt.name as type,
            bp.name as publisher,
            bm."publishmentYear" as "publishedYear",
            bm."pagesNumber" as "pagesNumber"
        
        FROM
            books b
                INNER JOIN book_metadata bm on bm.id = b."metadataId"
                INNER JOIN book_metadata_authors bma on bm.id = bma."metadataId"
                INNER JOIN book_authors ba on ba.id = bma."authorId"
                INNER JOIN book_types bt on bt.id = bm."typeId"
                INNER JOIN book_publisher bp on bp.id = bm."publisherId"
        
        WHERE
                b.id = :id
        
        GROUP BY
            b.id, bm.isbn, bm.title, bm.description, bt.name, bp.name, bm."publishmentYear", bm."pagesNumber";
    ';

    private static string $INSERT_NEW_METADATA = '
    INSERT INTO public.book_metadata
    (isbn, title, description, "publisherId", "publishmentYear", "pagesNumber", "typeId")
    VALUES
    (:isbn, :title, :description, :publisherId, :publishmentYear, :pagesNumber, :typeId)
    ';

    private static string $INSERT_NEW_METADATA_AUTHORS = '
    INSERT INTO public.book_metadata_authors
    ("metadataId", "authorId")
    VALUES
    (:metadataId, :authorId)
    ';

    public function getAllLightBooks(): array {
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare(self::$SELECT_ALL_LIGHT_BOOKS);
        $stmt->execute();

        $books = $stmt->fetchAll(PDO::FETCH_CLASS, "BookLight");

        $connection = null;

        return $books;
    }

    public function getBookById($id): ?BookFull {
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare(self::$SELECT_BOOK_BY_ID);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $book = $stmt->fetchObject( "BookFull");

        $connection = null;
        return $book ?: null;

    }

    public function createNewBookMetadata($body): int {
        $connection = $this->datasource->connect();

        $connection->beginTransaction();

        $stmt = $connection->prepare(self::$INSERT_NEW_METADATA);
        $stmt->bindParam(":isbn", $body['isbn'] );
        $stmt->bindParam(":title", $body['title'] );
        $stmt->bindParam(":description", $body['description'] );
        $stmt->bindParam(":publisherId", $body['publisherId'] );
        $stmt->bindParam(":publishmentYear", $body['publishmentYear'] );
        $stmt->bindParam(":pagesNumber", $body['pagesNumber'] );
        $stmt->bindParam(":typeId", $body['typeId'] );
        $result = $stmt->execute();
        $bookMetadataId = $connection->lastInsertId();

        if (!$result) {
            $connection->rollBack();
            return 0;
        }

        foreach ($body['authorsIds'] as $authorId) {
            $stmt = $connection->prepare(self::$INSERT_NEW_METADATA_AUTHORS);
            $stmt->bindParam(":metadataId", $bookMetadataId);
            $stmt->bindParam(":authorId", $authorId);
            $result = $stmt->execute();
            if (!$result) {
                $connection->rollBack();
                return 0;
            }
        }

        $connection->commit();

        $connection = null;

        return $bookMetadataId;
    }

}