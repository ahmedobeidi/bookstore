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
        // return [
        //     'name' => $hero->getName(),
        //     'image' => $hero->getImage(),
        //     'health' => $hero->getHealth(),
        //     'healthMax' => $hero->getHealthMax(),
        // ];
    }
}