<?php

$pdo = new PDO("mysql:host=db;port=3306;dbname=mydb", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
