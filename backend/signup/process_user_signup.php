<?php

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../../frontend/signup/user_signup.php?error=auth");
    return;
}

if (
    !isset(
        $_POST['firstName'], 
        $_POST['lastName'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['pass'],
    )
) {
    header('location: ../../frontend/signup/user_signup.php?error=notSet');
    return;
}

if (
    empty($_POST['firstName']) ||
    empty($_POST['lastName']) ||
    empty($_POST['email']) ||
    empty($_POST['phone']) ||
    empty($_POST['pass'])
) {
    header('location: ../../frontend/signup/user_signup.php?error=empty');
    $_SESSION['error'] = "All fields are required";
    return;
}

$firstName = htmlspecialchars(trim($_POST['firstName']));
$lastName = htmlspecialchars(trim($_POST['lastName']));
$email = htmlspecialchars(trim($_POST['email']));
$phone = htmlspecialchars(trim($_POST['firstName']));
$pass = trim($_POST['pass']);

// Check the lengths 
// if() {
// }

require_once '../../db/connect-db.php';

try {

    $sql = "SELECT email FROM user WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        
        $_SESSION["error"] = "email exist";
        header("Location: ../../frontend/signup/user_signup.php?error=4");
        exit;
    }

    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (firstName, lastName, phone, email, pass, role_id) VALUES (:firstName, :lastName, :phone, :email, :pass, :role_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':firstName' => $firstName,
            ':lastName' => $lastName,
            ':phone' => $phone,
            ':email' => $email,
            ':pass' => $hashedPassword,
            ':role_id' => "1",
    ]);

    $_SESSION['firstName'] = $firstName;
    header("Location: ../../frontend/home/home.php?success");
    return;

} catch(PDOException $error) {

    $_SESSION["erreur"] = "Error " . $error->getMessage();
    header("Location: ../../index.php");
    exit;
}