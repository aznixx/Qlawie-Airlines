<?php
$host = getenv('DB_HOST');     // 'db'
$port = getenv('DB_PORT');     // '3306'
$name = getenv('DB_NAME');     // 'mydb'
$user = getenv('DB_USER');     // 'root'
$pass = getenv('DB_PASSWORD'); // ''

$pdo = new PDO("mysql:host=$host;port=$port;dbname=$name", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);