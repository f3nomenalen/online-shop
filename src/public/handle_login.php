<?php

$username = $_POST['username'];
$password = $_POST['password'];

$pdo = new PDO('pgsql:host=postgres;port=5432; dbname= postgres', 'user', 'pass');
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$stmt->execute(['email' => $username]);

$user = $stmt->fetch();

$errors = [];

if ($user === false) {
    $errors['username'] = 'пользователь или пароль указаны не верно';
} else {
    $passwordDb = $user['password'];

    if(password_verify($password, $passwordDb)) {
        header("Location: 'catalog.php'");
    } else {
        $errors['password'] = 'пользователь или пароль указаны не верно';
    }
}

require_once './login_form.php';
