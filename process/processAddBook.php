<?php

require_once '../utils/autoloader.php';

// var_dump($_POST);
// var_dump($_FILES);
// die();

$target_dir = "../public/assets/images/books/";

if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}


$validator = new ValidatorService();

$validator->checkMethods("POST");

// TODO Finish POST validation

$validator->addStrategy('title', new RequiredValidator());
$validator->addStrategy('description', new RequiredValidator());
$validator->addStrategy('price', new RequiredValidator());

$validator->addStrategy('title', new StringValidator(255));
$validator->addStrategy('description', new StringValidator(255));
$validator->addStrategy('price', new IntegerValidator(10000));

if (!$validator->validate($_POST)) {
    header('../public/addBook.php');
    exit;
}

$validator->addStrategy('image', new ImageValidator());

if (!$validator->validate($_FILES)) {
    header('../public/addBook.php');
    exit;
}

$uniqueName = time() . "-" . uniqid() . "-" . basename($_FILES["image"]["name"]);

$target_file = $target_dir . $uniqueName;

if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    header('../public/addBook.php?uploadError=1');
    exit;
}

// Create Object Book, then insert to database
$sanitizedData = $validator->sanitize($_POST);


die();
