<?php

class BookMapper {

    public static function mapToObject(array $book) 
    {
        return new Book(
            $book['id'],
            $book['title'],
            $book['coverPhoto'],
            $book['price'],
            $book['seller_id'],
            $book['description'],
            $book['status_id'],
        );
    }
}