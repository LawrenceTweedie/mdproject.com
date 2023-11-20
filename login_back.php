<?php
session_start();
if (isset($_SESSION['email'])) {
    header('Location: /index.php');
}

$email = $_POST['email'];
$pass = $_POST['pass'];

$pdo = include_once __DIR__ . '/connection.php';

$sql = "SELECT * FROM users WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute([
 'email' => $email
]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($pass, $user['password'])) {
    $_SESSION['email'] = $user['email'];
    header('Location: /index.php');
} else {
    $error = "Пользователь не найден.";
}