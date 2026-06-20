<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pageTitle = "Boeken - Qlawie Airlines";
require_once __DIR__ . "/../config/pdo.php";

$reis_id = $_GET['reis_id'] ?? '';
$vlucht_id = $_GET['vlucht_id'] ?? '';
$gebruiker = false;
$foutmelding = $_SESSION['foutmelding'] ?? '';
unset($_SESSION['foutmelding']);

if (isset($_SESSION['gebruiker_id'])) {
    $gebruiker_id = $_SESSION['gebruiker_id'];

    $stmt = $pdo->prepare("SELECT * FROM gebruikers WHERE id = :id");
    $stmt->bindParam(':id', $gebruiker_id);
    $stmt->execute();
    $gebruiker = $stmt->fetch();
}

$stmt = $pdo->prepare("SELECT * FROM reizen WHERE status = 'actief' ORDER BY titel");
$stmt->execute();
$reizen = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT vluchten.*, bestemmingen.stad
FROM vluchten
LEFT JOIN bestemmingen ON vluchten.bestemming_id = bestemmingen.id
WHERE vluchten.is_actief = 1
ORDER BY vluchten.vertrek_datum");
$stmt->execute();
$vluchten = $stmt->fetchAll();
