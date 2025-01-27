<?php
require_once '../utils/autoloader.php';

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

<a href="./home.php">Home</a> <br>

<?php if($user->getRole_id() === 2): ?>
<a href="./addBook.php">Add Book</a>
<?php endif ?>

<h1>Profile Page</h1>


</body>
</html>