<?php
session_start();
$pageTitle = "Qlawie Airlines";
require_once __DIR__ . "/../config/pdo.php";

$stmt = $pdo->query("SELECT * FROM bestemmingen");
$bestemmingen = $stmt->fetchAll();
