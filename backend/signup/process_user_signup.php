<?php

session_start();

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['error'] = "Auth";
    header("Location: ../../frontend/signup/client_signup.php?error=auth");
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
    $_SESSION['error'] = "Not Set";
    header('location: ../../frontend/signup/client_signup.php?error=notSet');
    return;
}

if (
    empty($_POST['firstName']) ||
    empty($_POST['lastName']) ||
    empty($_POST['email']) ||
    empty($_POST['phone']) ||
    empty($_POST['pass'])
) {
    $_SESSION['error'] = "All fields are required";

    $role = htmlspecialchars(trim($_POST['role']));

    header("location: ../../frontend/signup/client_signup.php?error=empty&role_id={$role}");
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
        
        $_SESSION["error"] = "Email exist";
        header("Location: ../../frontend/signup/client_signup.php?error=4&role_id={$role}");
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
            ':role_id' => $role,
    ]);

    $sql = "SELECT * FROM user WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $_SESSION['user'] = $user;

    header("Location: ../../frontend/home/home.php?success");
    return;

} catch(PDOException $error) {

    $_SESSION["error"] = $error->getMessage();
    header("Location: ../../index.php");
    return;
}