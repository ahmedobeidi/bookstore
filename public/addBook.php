<?php

require_once '../utils/autoloader.php';

session_start();

if (!isset($_SESSION['seller'])) {
    header("Location: ./home.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="./assets/styles/output.css">
</head>
<body>

<a href="./home.php">Home</a> <br>
<a href="./profile.php">Profile</a> 

<h1>ADD Book Page</h1>

<form enctype="multipart/form-data"  action="../process/processAddBook.php" method="post">
    <input
        type="text"
        placeholder="Title"
        name="title"
        class="border-2 border-solid"
        required
    >

    <br><br>

    <textarea
        type="text"
        placeholder="Description"
        name="description"
        class="border-2 border-solid"
        required
    ></textarea>

    <br><br>

    <input
        type="text"
        placeholder="Price"
        name="price"
        class="border-2 border-solid"
        required
    >

    <br><br>

    <input 
        type="file" 
        name="image" 
        accept="image/*" 
        required
    >

    <br><br>

    <input 
        type="submit" 
        value="ADD"
        class="border-2 border-solid"
        required
    >
</form>

</body>
</html>