<?php

final class Book {

    private int $id;
    private string $title;
    private string $coverPhoto;
    private string $description;
    private int $price;
    private int $seller_id;
    private int $status_id;

    public function __construct(int $id, string $title, string $coverPhoto, string $description, int $price, int $seller_id, int $status_id)
    {
        $this->id = $id;
        $this->title = $title;
        $this->coverPhoto = $coverPhoto;
        $this->description = $description;
        $this->price = $price;
        $this->seller_id = $seller_id;
        $this->status_id = $status_id;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }


    /**
     * Get the value of coverPhoto
     */ 
    public function getCoverPhoto()
    {
        return $this->coverPhoto;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the value of seller_id
     */ 
    public function getSeller_id()
    {
        return $this->seller_id;
    }

    /**
     * Get the value of status_id
     */ 
    public function getStatus_id()
    {
        return $this->status_id;
    }
}