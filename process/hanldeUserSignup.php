<?php

require_once '../utils/autoloader.php';


$validator = new ValidatorService();

$validator->checkMethods("POST");

$validator->addStrategy('firstName', new RequiredValidator());
$validator->addStrategy('lastName', new RequiredValidator());
$validator->addStrategy('phone', new RequiredValidator());
$validator->addStrategy('email', new RequiredValidator());
$validator->addStrategy('pass', new RequiredValidator());
$validator->addStrategy('role_id', new RequiredValidator());

$validator->addStrategy('firstName', new StringValidator(30));
$validator->addStrategy('lastName', new StringValidator(30));
$validator->addStrategy('pass', new StringValidator(30));
$validator->addStrategy('role_id', new IntegerValidator(30));

$validator->addStrategy('email', new EmailValidator());

$validator->addStrategy('phone', new PhoneValidator());

$validator->addStrategy('pass', new PasswordValidator());


if (!$validator->validate($_POST)) {
    header('location: ../public/userSignup.php?role_id=1');
    exit();
}


$sanitizedUserData = $validator->sanitize($_POST);

$userRepository = new UserRepository();

$user = $userRepository->findByEmail($sanitizedUserData['email']);

if ($user) {
    header('location: ../public/userSignup.php?error=userExist&role_id=1');
    exit();
}

$user = new User($sanitizedUserData['firstName'], $sanitizedUserData['lastName'], $sanitizedUserData['phone'],$sanitizedUserData['email'], $sanitizedUserData['pass'], $sanitizedUserData['role_id']);

$userRepository->create($user);

session_start();

$_SESSION['user'] = $user;

header("Location: ../index.php");
exit();