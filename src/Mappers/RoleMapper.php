<?php 

class RoleMapper {

    public static function mapToObject(array $role)
    {
        return new Role(
            $role['id'],
            $role['role'],
        );
    }

    public static function mapToArray(Role $role)
    {
        return [
            'id' => $role->getId(),
            'role' => $role->getRole(),
        ];
    }
}