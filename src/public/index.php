

<?php

$pdo = new PDO ('pgsql:host=postgres;port=5432; dbname=mydb',  'user',  'pass');
$pdo->exec("INSERT INTO users (name, email, password) VALUES ('Ivan', 'ivan@mail.ru', '123')");
$statement = $pdo->query("SELECT * FROM users WHERE id = 3");
$data = $statement->fetch();
echo "<pre>";
print_r($data);
echo "<pre>";*/