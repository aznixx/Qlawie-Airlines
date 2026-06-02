<?php
$pageTitle = "Bestemmingen - Qlawie Airlines";
require_once __DIR__ . "/../config/pdo.php";

$stmt = $pdo->query('SELECT * FROM bestemmingen');
$bestemmingen = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once __DIR__ . "/../includes/navbar.php";
