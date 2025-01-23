<?php

final class Role {

    private int $id;
    private string $role;

    public function __construct(int $id, string $role)
    {
        $this->id = $id;
        $this->role = $role;
    }

    public function getId() 
    {
        return $this->id;
    }

    public function getRole() 
    {
        return $this->role;
    }
}