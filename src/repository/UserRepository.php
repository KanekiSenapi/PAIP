<?php

require_once "Repository.php";
require_once __DIR__."/../model/security/User.php";
require_once __DIR__."/../model/user/UserList.php";

class UserRepository extends Repository {
    protected string $GET_ALL_FIELDS = "id, concat(name, ' ' ,surname) as fullname";
    protected string $GET_ALL_TABLE = "public.users";
    protected string $CLASS = "UserList";

    private static string $SELECT_BY_EMAIL = "SELECT id, email, password, name, surname, id FROM public.users WHERE email = :email";
    private static string $INSERT = "INSERT INTO public.users (email, password, name, surname) VALUES (:email, :password, :name, :surname)";

    public function getUserByEmail(string $email): ?User {
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare(self::$SELECT_BY_EMAIL);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $connection = null;

        if (!$user) {
            return null;
        }

        return new User($user["email"], $user["password"], $user["name"], $user["surname"], $user["id"]);
    }

    public function existUserByEmail(string $email): bool {
        return $this->getUserByEmail($email) != null;
    }

    public function insertUser(User $user): bool {
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare(self::$INSERT);
        $email = $user->getEmail();
        $password = $user->getPassword();
        $name = $user->getName();
        $surname = $user->getSurname();

        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":surname", $surname);
        $inserted = $stmt->execute();
        $connection = null;
        return $inserted;
    }
}