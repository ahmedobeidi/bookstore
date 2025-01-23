<?php

final class RoleRepository extends AbstractRepository {

    public function __construct()
    {
        parent::__construct();
    }

    public function findAll(): array 
    {
        $sql = "SELECT * FROM `role`";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $roleTable = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $roles = [];

        foreach ($roleTable as $roleColumn) 
        {
            $roles[] = RoleMapper::mapToObject($roleColumn);
        }

        return $roles;
    }
}