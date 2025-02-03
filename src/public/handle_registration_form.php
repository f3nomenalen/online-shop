<?php
$pdo = new PDO ('pgsql:host=postgres;port=5432; dbname=mydb',  'user',  'pass');

$name = $_GET ['name'];
$email = $_GET ['email'];
$password = $_GET ['psw'];
$passwordRep = $_GET ['psw-repeat'];

function validateName($name)
{
    if ((strlen($name) >= 2) && preg_match('/^[a-zA-Zа-яА-ЯёЁ]+$/u', $name)) {
        return true;
    } else {
        echo "Имя должно содержать более одной буквы и состоять только из букв";
    }
}
function validateEmail ($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        echo "Email '$email' не корректный";
    }
}

function validatePassword ($password, $passwordRep)
{
    if (strlen($password) >= 5 && strlen($password) <= 20 && preg_match('/[A-Z]/', $password)) {
        if ($password === $passwordRep) {
            return true;
        } else {
            echo "Пароли не совпадают";
        }
    } else {
        echo "Некорректный пароль. Пароль должен содержать хотя бы одну заглавную букву, длина пароля от 5 до 20 символов.";
    }
}

    if (validateEmail($email)) {
        if (validatePassword($password, $passwordRep)) {
            if (validateName($name)) {
                $pdo->exec("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
                $statement = $pdo->query("SELECT * FROM users ORDER BY id DESC LIMIT 1");
                $result = $statement->fetch();
                print_r($result);
            }
        }
    }

