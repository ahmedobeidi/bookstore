<?php

final class SellerRepository extends AbstractRepository {

    public function __construct()
    {
        parent::__construct();
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