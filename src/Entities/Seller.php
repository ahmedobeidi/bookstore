<?php 

final class Seller extends User {

    private int $id;
    private string $companyName;
    private string $companyAddress;
    private int $user_id;
    
    public function __construct(string $firstName, string $lastName,  string $phone, string $email, string $pass, int $role_id)
    {
        
    }
}