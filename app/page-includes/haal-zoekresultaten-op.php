<?php
$pageTitle = "Zoekresultaten - Qlawie Airlines";
require_once __DIR__ . "/../config/pdo.php";

$zoek = trim($_GET["zoek"] ?? "");
$resultaten = [];

if ($zoek) {
    $zoekterm = "%" . $zoek . "%";

    $stmt = $pdo->prepare("SELECT * FROM bestemmingen WHERE stad LIKE :zoek_stad OR naam LIKE :zoek_naam");
    $stmt->bindParam(':zoek_stad', $zoekterm);
    $stmt->bindParam(':zoek_naam', $zoekterm);
    $stmt->execute();
    $resultaten = $stmt->fetchAll();
} else {
    $stmt = $pdo->prepare("SELECT * FROM bestemmingen");
    $stmt->execute();
    $resultaten = $stmt->fetchAll();
}
