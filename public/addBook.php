<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ./home.php");
    exit();
}

$user = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>

<a href="./profile.php">Profile</a> <br>
<a href="./addBook.php">Add Book</a>

</body>
</html>