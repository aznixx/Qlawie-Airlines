<?php
session_start();
require_once __DIR__ . "/../../config/pdo.php";

$stmt = $pdo->prepare("SELECT * FROM vluchten ORDER BY vertrek_datum");
$stmt->execute();
$vluchten = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT * FROM reizen ORDER BY id DESC");
$stmt->execute();
$reizen = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT recensies.*, reizen.titel FROM recensies LEFT JOIN reizen ON recensies.reis_id = reizen.id ORDER BY recensies.id DESC");
$stmt->execute();
$recensies = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT boekingen.*, gebruikers.voornaam, gebruikers.achternaam, reizen.titel, vluchten.vlucht_nummer, vluchten.aankomst_luchthaven FROM boekingen LEFT JOIN gebruikers ON boekingen.gebruiker_id = gebruikers.id LEFT JOIN reizen ON boekingen.reis_id = reizen.id LEFT JOIN vluchten ON boekingen.vlucht_id = vluchten.id ORDER BY boekingen.id DESC");
$stmt->execute();
$boekingen = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT * FROM contact_berichten ORDER BY id DESC");
$stmt->execute();
$contactBerichten = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT COUNT(*) AS totaal FROM boekingen");
$stmt->execute();
$aantalBoekingen = $stmt->fetch();

$stmt = $pdo->prepare("SELECT COUNT(*) AS totaal FROM vluchten");
$stmt->execute();
$aantalVluchten = $stmt->fetch();

$stmt = $pdo->prepare("SELECT SUM(aantal_reizigers) AS totaal FROM boekingen");
$stmt->execute();
$aantalPassagiers = $stmt->fetch();

$stmt = $pdo->prepare("SELECT SUM(totaalprijs) AS totaal FROM boekingen");
$stmt->execute();
$omzet = $stmt->fetch();


$reis_bewerken = false;

if (isset($_GET['reis_id'])) {
    $reis_id = $_GET['reis_id'];

    $stmt = $pdo->prepare("SELECT * FROM reizen WHERE id = :id");
    $stmt->bindParam(":id", $reis_id);
    $stmt->execute();
    $reis_bewerken = $stmt->fetch();
}

$vlucht_bewerken = false;

if (isset($_GET['vlucht_id'])) {
    $vlucht_id = $_GET['vlucht_id'];

    $stmt = $pdo->prepare("SELECT * FROM vluchten WHERE id = :id");
    $stmt->bindParam(":id", $vlucht_id);
    $stmt->execute();
    $vlucht_bewerken = $stmt->fetch();
}
