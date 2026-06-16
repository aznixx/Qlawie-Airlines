<?php
$pageTitle = "Bestemmingen - Qlawie Airlines";
require_once __DIR__ . "/../config/pdo.php";

$stmt = $pdo->prepare('SELECT * FROM bestemmingen');
$stmt->execute();
$bestemmingen = $stmt->fetchAll();