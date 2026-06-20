<?php
$pageTitle = "Vlucht - Qlawie Airlines";
require_once __DIR__ . "/../config/pdo.php";

$id = $_GET['id'] ?? '';
$vlucht = false;

if ($id !== '') {
    $stmt = $pdo->prepare("SELECT vluchten.*, bestemmingen.naam, bestemmingen.stad, bestemmingen.land, bestemmingen.afbeelding
    FROM vluchten
    LEFT JOIN bestemmingen ON vluchten.bestemming_id = bestemmingen.id
    WHERE vluchten.id = :id AND vluchten.is_actief = 1
    LIMIT 1");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $vlucht = $stmt->fetch();
}

if ($vlucht) {
    $pageTitle = "Vlucht naar " . $vlucht['stad'] . " - Qlawie Airlines";
}
