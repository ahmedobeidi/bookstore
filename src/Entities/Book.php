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
}