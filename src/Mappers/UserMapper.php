<?php 

class UserMapper {

    public static function mapToObject(array $user)
    {
        return new User(
            $user['id'],
            $user['firstName'],
            $user['lastName'],
            $user['phone'],
            $user['email'],
            $user['pass'],
            $user['role_id'],
        );
    }

    public static function mapToArray(User $user)
    {
        return [
            'id' => $user->getId(),
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'phone' => $user->getPhone(),
            'email' => $user->getEmail(),
            'pass' => $user->getPass(),
            'role_id' => $user->getRole_id(),
        ];
    }
}