<?php 

final class Seller {

    private int $id;
    private int $user_id;
    private string $companyName;
    private string $companyAddress;
    
    public function __construct(int $user_id, string $companyName = "", string $companyAddress = "")
    {
        $this->user_id = $user_id;
        $this->companyName = $companyName;
        $this->companyAddress = $companyAddress;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Get the value of companyName
     */ 
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Get the value of companyAddress
     */ 
    public function getCompanyAddress()
    {
        return $this->companyAddress;
    }
}