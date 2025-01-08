<?php

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../../frontend/login/login.php?error=auth");
    return;
}

if (
    !isset(
        $_POST['email'],
        $_POST['pass'],
    )
) {
    header('location: ../../frontend/login/login.php?error=notSet');
    return;
}

if (
    empty($_POST['email']) ||
    empty($_POST['pass'])
) {
    header('location: ../../frontend/login/login.php?error=empty');
    $_SESSION['error'] = "All fields are required";
    return;
}

$email = htmlspecialchars(trim($_POST['email']));
$pass = trim($_POST['pass']);

// Check the lengths 
// if() {
// }

require_once '../../db/connect-db.php'; 
session_start();

try {
    $sql = "SELECT * FROM user WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($pass, $user['pass'])) {
        header("Location: ../../frontend/home/home.php?success");
        return;
    } 
    else {
        header("Location: ../../frontend/login/login.php");
        return;
    }

} catch (PDOException $error) {
    echo "Error";
}
