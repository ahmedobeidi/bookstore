<?php 

    session_start();

    if(!isset($_SESSION['user'])) {
        header('Location: ../../index.php');
        return;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Home Page</h1>
    <a href="../../backend/logout/logout.php">Logout</a>
</body>
</html>