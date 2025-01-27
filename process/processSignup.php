<?php

require_once '../utils/autoloader.php';

session_start();

$validator = new ValidatorService();

$validator->checkMethods("POST");


$validator->addStrategy('firstName', new RequiredValidator());
$validator->addStrategy('lastName', new RequiredValidator());
$validator->addStrategy('phone', new RequiredValidator());
$validator->addStrategy('email', new RequiredValidator());
$validator->addStrategy('pass', new RequiredValidator());

$validator->addStrategy('firstName', new StringValidator(30));
$validator->addStrategy('lastName', new StringValidator(30));
$validator->addStrategy('phone', new StringValidator(30));
$validator->addStrategy('email', new StringValidator(255));
$validator->addStrategy('pass', new StringValidator(255));

$validator->addStrategy('email', new EmailValidator());

$validator->addStrategy('phone', new PhoneValidator());

$validator->addStrategy('pass', new PasswordValidator());


if (!$validator->validate($_POST)) {
    if ($_SESSION['role'] === 1) {
        header('location: ../public/userSignup.php');
        exit();
    } elseif ($_SESSION['role'] === 2) {
        header('location: ../public/sellerSignup.php');
        exit();
    } else {
        header('location: ../home.php?err=1');
        exit();
    }
}


$sanitizedData = $validator->sanitize($_POST);

$userRepository = new UserRepository();

$user = $userRepository->findByEmail($sanitizedData['email']);

if ($user) {
    header('location: ../public/userSignup.php?error= not found');
    exit();
}

$user = new User(0, $sanitizedData['firstName'], $sanitizedData['lastName'], $sanitizedData['phone'], $sanitizedData['email'], $sanitizedData['pass'], $_SESSION['role']);

$userRepository->create($user);

$user = $userRepository->findByEmail($sanitizedData['email']);

session_start();

$_SESSION['user'] = $user;
$_SESSION['postData'] = $_POST;

if ($user->getRole_id() === 2) {
    $_SESSION['companyName'] = $sanitizedData['companyName'];
    $_SESSION['companyAddress'] = $sanitizedData['companyAddress'];
    header("Location: ./processSellerSignup.php");
    exit();
}

unset($_SESSION['postData']);

header("Location: ../index.php");
exit();
