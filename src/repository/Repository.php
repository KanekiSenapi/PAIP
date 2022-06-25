<?php

require_once __DIR__ . "/../../Datasource.php";

class Repository {
    private string $SELECT_ALL = "SELECT %fields% FROM %table%";
    private string $DELETE_BY_ID = "DELETE FROM %table% WHERE id = :id";
    protected string $GET_ALL_FIELDS = "*";
    protected string $GET_ALL_TABLE = "none";
    protected string $CLASS = "none";

    protected $datasource;

    public function __construct() {
        $this->datasource = new Datasource();
    }

    public function getAll(): array {
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare($this->prepareDynamicQuery($this->SELECT_ALL));
        $stmt->execute();

        $types = $stmt->fetchAll(PDO::FETCH_CLASS, $this->CLASS);

        $connection = null;

        return $types;
    }

    public function deleteById($id): bool {
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare($this->prepareDynamicQuery($this->DELETE_BY_ID));
        $stmt->bindParam(":id", $id);
        $return = $stmt->execute();

        $connection = null;

        return $return;
    }

    protected function prepareDynamicQuery($query) : string{
        $query = str_replace("%fields%", $this->GET_ALL_FIELDS, $query);
        $query = str_replace("%table%", $this->GET_ALL_TABLE, $query);
        return $query;
    }
}