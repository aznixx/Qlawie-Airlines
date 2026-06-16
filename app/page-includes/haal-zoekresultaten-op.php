<?php
$pageTitle = "Zoekresultaten - Qlawie Airlines";
require_once __DIR__ . "/../config/pdo.php";

$zoek = trim($_GET["zoek"] ?? "");
$resultaten = [];

if ($zoek) {
    $stmt = $pdo->prepare("SELECT * FROM bestemmingen WHERE stad LIKE '%$zoek%'");
    $stmt->execute();
    $resultaten = $stmt->fetchAll();
}

