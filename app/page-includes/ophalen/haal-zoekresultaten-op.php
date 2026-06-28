<?php
require_once __DIR__ . "/../../config/pdo.php";

$zoek = $_GET['zoek'] ?? '';
$vertrekdatum = $_GET['vertrekdatum'] ?? '';
$terugkomstdatum = $_GET['terugkomstdatum'] ?? '';

$sql = "SELECT * FROM reizen WHERE 1 = 1";

if ($zoek != '') {
    $zoekterm = "%" . $zoek . "%";
    $sql = $sql . " AND (titel LIKE :zoek OR korte_beschrijving LIKE :zoek OR aankomst_luchthaven LIKE :zoek)";
}

if ($vertrekdatum != '') {
    $sql = $sql . " AND vertrekdatum = :vertrekdatum";
}

if ($terugkomstdatum != '') {
    $sql = $sql . " AND terugkomstdatum = :terugkomstdatum";
}

$stmt = $pdo->prepare($sql);

if ($zoek != '') {
    $stmt->bindParam(":zoek", $zoekterm);
}

if ($vertrekdatum != '') {
    $stmt->bindParam(":vertrekdatum", $vertrekdatum);
}

if ($terugkomstdatum != '') {
    $stmt->bindParam(":terugkomstdatum", $terugkomstdatum);
}

$stmt->execute();
$resultaten = $stmt->fetchAll();
