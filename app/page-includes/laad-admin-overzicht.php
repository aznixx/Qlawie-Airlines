<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['gebruiker_id']) || $_SESSION['rol'] !== 'beheerder') {
    header("Location: ../index.php");
    exit;
}

$pageTitle = "Admin dashboard - Qlawie Airlines";
$basePath = "../";

require_once __DIR__ . "/../config/pdo.php";

$stmt = $pdo->prepare("SELECT reizen.*, bestemmingen.land
FROM reizen
LEFT JOIN bestemmingen ON reizen.bestemming_id = bestemmingen.id
ORDER BY reizen.id DESC");
$stmt->execute();
$reizen = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT boekingen.*, gebruikers.voornaam, gebruikers.achternaam, reizen.titel, vluchten.vlucht_nummer, bestemmingen.stad
FROM boekingen
LEFT JOIN gebruikers ON boekingen.gebruiker_id = gebruikers.id
LEFT JOIN reizen ON boekingen.reis_id = reizen.id
LEFT JOIN vluchten ON boekingen.vlucht_id = vluchten.id
LEFT JOIN bestemmingen ON vluchten.bestemming_id = bestemmingen.id
ORDER BY boekingen.id DESC");
$stmt->execute();
$boekingen = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT recensies.*, reizen.titel
FROM recensies
LEFT JOIN reizen ON recensies.reis_id = reizen.id
ORDER BY recensies.id DESC");
$stmt->execute();
$recensies = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT COUNT(*) AS totaal FROM boekingen WHERE status = 'aangevraagd'");
$stmt->execute();
$openBoekingen = $stmt->fetch();

$stmt = $pdo->prepare("SELECT SUM(totaalprijs) AS totaal FROM boekingen WHERE status != 'geannuleerd'");
$stmt->execute();
$omzet = $stmt->fetch();

$stmt = $pdo->prepare("SELECT COUNT(*) AS totaal FROM recensies WHERE status = 'in_afwachting'");
$stmt->execute();
$reviewsWachtrij = $stmt->fetch();

$acties = $openBoekingen['totaal'] + $reviewsWachtrij['totaal'];
