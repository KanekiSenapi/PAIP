<?php

require_once "Repository.php";
require_once __DIR__."/../model/User.php";

class UserRepository extends Repository {

    private static string $SELECT_BY_EMAIL = "SELECT * FROM public.users WHERE email = :email";

    public function getUser(string $email): ?User {
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare(self::$SELECT_BY_EMAIL);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User($user['email'], $user['password'], $user['name'], $user['surname']);
    }
}