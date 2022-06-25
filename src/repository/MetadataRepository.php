<?php

require_once "Repository.php";
require_once __DIR__."/../model/BookMetadataLight.php";

class MetadataRepository extends Repository {
    protected string $CLASS = "BookMetadataLight";
    protected string $GET_ALL_FIELDS = "id,title";
    protected string $GET_ALL_TABLE = "public.book_metadata";

    private static string $INSERT_NEW_METADATA = '
    INSERT INTO 
        public.book_metadata
        (isbn, title, description, "publisherId", "publishmentYear", "pagesNumber", "typeId")
    VALUES
        (:isbn, :title, :description, :publisherId, :publishmentYear, :pagesNumber, :typeId)
    ';

    private static string $INSERT_NEW_METADATA_AUTHORS = '
    INSERT INTO 
        public.book_metadata_authors
        ("metadataId", "authorId")
    VALUES
        (:metadataId, :authorId)
    ';


    private static string $COUNT_BY_ISBN = '
    SELECT 
        count(*) as count
    FROM 
        public.book_metadata bm
    WHERE 
        bm.isbn = :isbn;
    ';

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

    public function existByIsbn($isbn): bool {
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare(self::$COUNT_BY_ISBN);
        $stmt->bindParam(':isbn', $isbn);
        $stmt->execute();

        $count = $stmt->fetch(PDO::FETCH_ASSOC);

        $connection = null;
        return $count['count'] > 0;

    }
}