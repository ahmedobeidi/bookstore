<?php

final class SellerRepository extends AbstractRepository {

    public function __construct()
    {
        parent::__construct();
    }

    public function findByUser_id(int $user_id) 
    {
        $sql = "SELECT * FROM `seller` WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
        $sellerRow = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$sellerRow) {
            return null;
        }

        return SellerMapper::mapToObject($sellerRow);
    }

    public function create(Seller $seller) 
    {
        $sql = "INSERT INTO `seller` (`companyName`, `companyAddress`, `user_id`) VALUES (:companyName, :companyAddress, :user_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':companyName' => $seller->getCompanyName(),
            ':companyAddress' => $seller->getCompanyAddress(),
            ':user_id' => $seller->getUser_id(),
        ]);
    }
}