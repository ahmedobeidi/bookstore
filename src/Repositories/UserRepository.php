<?php

final class UserRepository extends AbstractRepository {

    public function __construct()
    {
        parent::__construct();
    }

    public function findByEmail(string $email) 
    {
        $sql = "SELECT * FROM `user` WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$userRow) {
            return null;
        }

        return UserMapper::mapToObject($userRow);
    }

    public function findAll(): array 
    {
        $sql = "SELECT * FROM `user`";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $userTable = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $users = [];

        foreach ($userTable as $userColumn) 
        {
            $users[] = UserMapper::mapToObject($userColumn);
        }

        return $users;
    }

    public function create(User $user) 
    {
        $hashedPassword = password_hash($user->getPass(), PASSWORD_DEFAULT);
        $sql = "INSERT INTO `user` (`firstName`, `lastName`, `phone`, `email`, `pass`, `role_id`) VALUES (:firstName, :lastName, :phone, :email, :pass, :role_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':firstName' => $user->getFirstName(),
            ':lastName' => $user->getLastName(),
            ':phone' => $user->getPhone(),
            ':email' => $user->getEmail(),
            ':pass' => $hashedPassword,
            ':role_id' => $user->getRole_id(),
        ]);
    }
}