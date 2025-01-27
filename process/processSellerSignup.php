<?php


require_once '../utils/autoloader.php';

session_start();

$user = $_SESSION['user'];
$companyName = $_SESSION['companyName'];
$companyAddress = $_SESSION['companyAddress'];

$validator = new ValidatorService();

$validator->addStrategy('companyName', new StringValidator(255));
$validator->addStrategy('companyAddress', new StringValidator(255));

// if (!$validator->validate($companyName, $companyAddress)) {
//     session_start();
//     session_destroy();
//     header('location: ../public/sellerSignup.php?role_id=2');
//     exit();
// }

if (!$validator->validate($_SESSION['postData'])) {
        session_start();
        session_destroy();
        header('location: ../public/sellerSignup.php?role_id=2');
        exit();
}

$seller = new Seller(0, $user->getId(), $companyName, $companyAddress);

$sellerRepository = new SellerRepository();

$sellerRepository->create($seller);
$seller = $sellerRepository->findByUser_id($user->getId());

if (!$seller) {
    session_destroy();
    header('location: ../public/sellerSignup.php?error=notCreated&role_id=2');
    exit();
}

unset($_SESSION['companyName'], $_SESSION['companyAddress'], $_SESSION['postData']);

$_SESSION['seller'] = $seller;

header('location: ../public/home.php?error=sellerCreatedSuccessfuly');
exit();

