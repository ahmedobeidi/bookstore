<?php 

class SellerMapper {

    public static function mapToObject(array $seller)
    {
        return new Seller(
            $seller['id'],
            $seller['user_id'],
            $seller['companyName'],
            $seller['companyAddress'],
        );
    }

    public static function mapToArray(Seller $seller)
    {
        return [
            'id' => $seller->getId(),
            'companyName' => $seller->getCompanyName(),
            'companyAddress' => $seller->getCompanyAddress(),
            'user_id' => $seller->getUser_id(),
        ];
    }
}