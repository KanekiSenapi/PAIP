<?php

require_once "Repository.php";
require_once __DIR__ . "/../model/borrows/BorrowMini.php";
require_once __DIR__ . "/../model/borrows/BorrowLight.php";
require_once __DIR__ . "/../model/borrows/BorrowFull.php";

class BorrowsRepository extends Repository {
    protected string $CLASS = "BorrowMini";
    protected string $GET_ALL_FIELDS = 'id,"borrowerId","lenderId","bookId","borrowedOn","returnOn","returnedOn"';
    protected string $GET_ALL_TABLE = "public.borrows";

    private static string $SELECT_ALL_LIGHT = '
        SELECT
        
            br.id as id,
            u.name as "borrowerName",
            br."bookId" as "bookId",
            bm.title as "bookTitle",
            string_agg(ba.fullname, \', \') as "bookAuthors",
            (SELECT br."returnedOn" IS NOT NULL) as returned,
            br."returnOn" < now() as expired
        
        FROM
            borrows br
            INNER JOIN users u on u.id = br."borrowerId"
            INNER JOIN books b on b.id = br."bookId"
            INNER JOIN book_metadata bm on bm.id = b."metadataId"
            INNER JOIN book_metadata_authors bma on bm.id = bma."metadataId"
            INNER JOIN book_authors ba on ba.id = bma."authorId"
        
        WHERE 
            br."returnedOn" IS NULL
        
        GROUP BY
            bm.title, br."bookId", u.name, br.id, br."bookId", br."borrowedOn"
        
        ORDER BY
            br."bookId", br."borrowedOn";
    ';

    private static string $SELECT_BY_ID = '
        SELECT
        
            br.id as id,
            u.name as "borrowerName",
            u2.name as "lenderName",
            bm.id as "bookId",
            bm.title as "bookTitle",
            string_agg(ba.fullname, \', \') as "bookAuthors",
            br."borrowedOn" as borrowedOn,
            br."returnOn" as returnOn,
            br."returnedOn" as returnedOn
        
        FROM
            borrows br
                INNER JOIN users u on u.id = br."borrowerId"
                INNER JOIN users u2 on u2.id = br."lenderId"
                INNER JOIN books b on b.id = br."bookId"
                INNER JOIN book_metadata bm on bm.id = b."metadataId"
                INNER JOIN book_metadata_authors bma on bm.id = bma."metadataId"
                INNER JOIN book_authors ba on ba.id = bma."authorId"
        
        WHERE
                br.id = :id
        
        GROUP BY
            br.id, u.name, u2.name, bm.id, bm.title , br."borrowedOn", br."returnOn", br."returnedOn"
    ';

    private static string $INSERT = '
        INSERT INTO
            public.borrows
            ("borrowerId", "lenderId", "bookId", "returnOn")
        VALUES
            (:borrowerId, :lenderId, :bookId, TO_TIMESTAMP(:returnOn));
    ';

    private static string $IS_BORROWED = '
        SELECT
            count(*)
        
        FROM
            borrows br
        
        WHERE
                br."bookId" = :bid AND
                br."returnedOn" IS NULL
    ';

    private static string $SELECT_ALL_BY_BOOK_ID = '
        SELECT
        
            br.id as id,
            u.name as "borrowerName",
            bm.title as "bookTitle",
            string_agg(ba.fullname, \', \') as "bookAuthors",
            (SELECT br."returnedOn" IS NOT NULL) as returned,
            br."returnOn" < now() as expired
        
        FROM
            borrows br
            INNER JOIN users u on u.id = br."borrowerId"
            INNER JOIN books b on b.id = br."bookId"
            INNER JOIN book_metadata bm on bm.id = b."metadataId"
            INNER JOIN book_metadata_authors bma on bm.id = bma."metadataId"
            INNER JOIN book_authors ba on ba.id = bma."authorId"
        
        WHERE 
            br."bookId" = :bid
        
        GROUP BY
            bm.title, u.name, br.id, br."bookId", br."borrowedOn"
        
        ORDER BY
            br."bookId", br."borrowedOn";
    ';

    private static string $UPDATE_RETURNED_ON = '
        UPDATE borrows
        SET "returnedOn" = now()
        WHERE id = :borrowId;
    ';

    public function getAllLight(): array {
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare(self::$SELECT_ALL_LIGHT);
        $stmt->execute();

        $books = $stmt->fetchAll(PDO::FETCH_CLASS, "BorrowLight");

        $connection = null;

        return $books;
    }

    public function getById(int $id): ?BorrowFull{
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare(self::$SELECT_BY_ID);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $entity = $stmt->fetchObject( "BorrowFull");

        $connection = null;
        return $entity ?: null;
    }

    public function insert($body): int {
        $connection = $this->datasource->connect();
        $createdId = 0;

        $stmt = $connection->prepare(self::$INSERT);
        $stmt->bindParam(":borrowerId", $body['borrowerId']);
        $stmt->bindParam(":lenderId", $body['lenderId']);
        $stmt->bindParam(":bookId", $body['bookId']);
        $stmt->bindParam(":returnOn", $body['returnOn']);
        $result = $stmt->execute();

        if ($result) {
            $createdId = $connection->lastInsertId();
        }


        $connection = null;

        return $createdId;
    }

    public function isBorrowed(int $bid): bool {
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare(self::$IS_BORROWED);
        $stmt->bindParam(':bid', $bid);
        $stmt->execute();

        $borrowed = $stmt->fetch( PDO::FETCH_ASSOC);

        $connection = null;
        return $borrowed === 1;
    }

    public function getByBookId($bid): array {
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare(self::$SELECT_ALL_BY_BOOK_ID);
        $stmt->bindParam(':bid', $bid);
        $stmt->execute();

        $books = $stmt->fetchAll(PDO::FETCH_CLASS, "BorrowLight");

        $connection = null;

        return $books;
    }

    public function updateBookReturned($borrowId): bool
    {
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare(self::$UPDATE_RETURNED_ON);
        $stmt->bindParam(':borrowId', $borrowId);
        $stmt->execute();

        $successfully = $stmt->execute();

        $connection = null;

        return $successfully;
    }
}