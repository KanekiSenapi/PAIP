<?php

require_once "Repository.php";
require_once __DIR__."/../model/Role.php";

class RoleRepository extends Repository {

    private static string $SELECT_BY_USER_ID = "SELECT r.name FROM public.roles r 
    INNER JOIN public.users_roles ur ON r.id = ur.rid
    INNER JOIN public.users u ON ur.uid = u.id
    WHERE u.id = :id";

    public function getRolesByUserId(string $uid): array{
        $connection = $this->datasource->connect();

        $stmt = $connection->prepare(self::$SELECT_BY_USER_ID);
        $stmt->bindParam(':id', $uid);
        $stmt->execute();

        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $connection = null;

        return $this->mapToRolesNameList($roles);;
    }

    private function mapToRolesNameList($roles): array {
        $mappedRoles = [];
        foreach ($roles as $role) {
            $mappedRoles[] = $role['name'];
        }
        return $mappedRoles;
    }
}