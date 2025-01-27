<?php

require_once '../utils/autoloader.php';


$validator = new ValidatorService();

$validator->checkMethods("POST");

$validator->addStrategy('email', new RequiredValidator());
$validator->addStrategy('pass', new RequiredValidator());

$validator->addStrategy('email', new StringValidator(255));
$validator->addStrategy('pass', new StringValidator(255));

$validator->addStrategy('email', new EmailValidator());

$validator->addStrategy('pass', new PasswordValidator());

if(!$validator->validate($_POST)) {
    header('location: ../public/login.php?error=Not Valid');
    exit();
}

$sanitizedData = $validator->sanitize($_POST);

$userRepository = new UserRepository();

$user = $userRepository->findByEmail($sanitizedData['email']);

// var_dump($user);
// die();

if(!$user) {
    header('location: ../public/login.php?error=Email Not Exist');
    exit();
}

if ($user && !password_verify($sanitizedData['pass'], $user->getPass())) {
    header('location: ../public/login.php?error=Wrong Email Or Password');
    exit();
}

session_start();
$_SESSION['user'] = $user;

if ($user->getRole_id() === 2) {
    $sellerRepository = new SellerRepository(); 
    $_SESSION['seller'] = $sellerRepository->findByUser_id($user->getId());
}
header("Location: ../public/home.php");
exit();