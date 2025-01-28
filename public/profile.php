<?php
require_once '../utils/autoloader.php';

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ./home.php");
    exit();
}

if (isset($_SESSION['seller'])) {
    $seller = $_SESSION['seller'];
    $bookRepo = new BookRepository();
    $books = $bookRepo->findAllBookBySellerId($seller->getId());
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

<?php if($seller): ?>
    <?php foreach($books as $book): ?>
        <div>
        <h2><?= htmlspecialchars($book->getTitle()); ?></h2>
        <img src="<?= htmlspecialchars($book->getCoverPhoto()); ?>" alt="">
        </div>
    <?php endforeach; ?>  
<?php endif; ?>    

</body>
</html>