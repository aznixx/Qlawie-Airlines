<?php
require_once __DIR__ . "/../../config/pdo.php";

$zoek = $_GET['zoek'] ;

if ($zoek === '') {
    $stmt = $pdo->prepare("SELECT * FROM reizen");
    $stmt->execute();
} else {
    $zoekterm = "%" . $zoek . "%";

    $stmt = $pdo->prepare("SELECT * FROM reizen WHERE titel LIKE :zoek OR korte_beschrijving LIKE :zoek OR aankomst_luchthaven LIKE :zoek");
    $stmt->bindParam(":zoek", $zoekterm);
    $stmt->execute();
}

$resultaten = $stmt->fetchAll();
