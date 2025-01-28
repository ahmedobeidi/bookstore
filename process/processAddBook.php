<?php

require_once '../utils/autoloader.php';

session_start();

$postValidator = new ValidatorService();

$postValidator->checkMethods("POST");

if (!isset($_SESSION['seller'])) {
    header("Location: ./home.php");
    exit();
}

$target_dir = "../public/assets/images/books/";

if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}
// TODO Finish POST validation

$postValidator->addStrategy('title', new RequiredValidator());
$postValidator->addStrategy('description', new RequiredValidator());
$postValidator->addStrategy('price', new RequiredValidator());

$postValidator->addStrategy('title', new StringValidator(255));
$postValidator->addStrategy('description', new StringValidator(255));
$postValidator->addStrategy('price', new IntegerValidator(10000));

if (!$postValidator->validate($_POST)) {
    header('Location: ../public/addBook.php');
    exit;
}

$fileValidator = new ValidatorService();

// $fileValidator->addStrategy('image', new RequiredValidator());
$fileValidator->addStrategy('image', new ImageValidator());


if (!$fileValidator->validate($_FILES)) {
    header('Location: ../public/addBook.php');
    exit;
}


$uniqueName = time() . "-" . uniqid() . "-" . basename($_FILES["image"]["name"]);

$target_file = $target_dir . $uniqueName;

if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    header('../public/addBook.php?uploadError=1');
    exit;
}

// Create Object Book, then insert to database
$sanitizedData = $postValidator->sanitize($_POST);

$book = new Book(0, $sanitizedData['title'], $target_file, $sanitizedData['price'], $_SESSION['seller']->getId(), $sanitizedData['description']);

$bookRepo = new BookRepository();
$bookRepo->create($book);

header("Location: ../public/profile.php");
exit();