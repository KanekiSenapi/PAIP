<?php

require_once __DIR__."/../repository/RoleRepository.php";

class RoleService {
    private RoleRepository $roleRepository;

    public function __construct() {
        $this->roleRepository = new RoleRepository();
    }

   public function getRolesForUid(string $uid): array {
        return $this->roleRepository->getRolesByUserId($uid);
   }

}