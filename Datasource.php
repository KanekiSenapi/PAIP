<?php

require_once "config.php";

class Datasource {
    private string $user;
    private string $password;
    private string $host;
    private string $port;
    private string $database;

    public function __construct() {
        $this->host = DB_HOST;
        $this->port = DB_PORT;
        $this->user = DB_USER;
        $this->password = DB_PASSWORD;
        $this->database = DB_DATABASE;
    }

    public function connect() {
        try {
            $conn = new PDO(
                "pgsql:host=$this->host;port=$this->port;dbname=$this->database",
                $this->user,
                $this->password,
                ["sslmode"  => "prefer"]
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}