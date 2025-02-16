<?php
$pdo = new PDO('pgsql:host=postgres;port=5432; dbname= postgres', 'user', 'pass');
$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll();

require_once "./catalog_page.php";

