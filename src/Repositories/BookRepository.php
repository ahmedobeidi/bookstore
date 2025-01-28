<?php

final class BookRepository extends AbstractRepository {

    public function __construct()
    {
        parent::__construct();
    }

    public function findAllBookBySellerId(int $seller_id): array 
    {
        $sql = "SELECT * FROM `book` WHERE seller_id = :seller_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([":seller_id" => $seller_id]);
        $bookTable = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $books = [];

        foreach ($bookTable as $book) 
        {
            $books[] = BookMapper::mapToObject($book);
        }

        return $books;
    }

    public function create(Book $book) 
    {
        $sql = "INSERT INTO `book` (`title`, `coverPhoto`, `description`, `price`, `seller_id`, `status_id`) VALUES (:title, :coverPhoto, :description, :price, :seller_id, :status_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":title" => $book->getTitle(),
            ":coverPhoto" => $book->getCoverPhoto(),
            ":price" => $book->getPrice(),
            ":seller_id" => $book->getSeller_id(),
            ":description" => $book->getDescription(),
            ":status_id" => $book->getStatus_id()
        ]);
    }


}