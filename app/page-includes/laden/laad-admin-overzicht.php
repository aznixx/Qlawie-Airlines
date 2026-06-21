<?php
require_once __DIR__ . "/../../config/pdo.php";

$stmt = $pdo->prepare("SELECT * FROM reizen");
$stmt->execute();

$reizen = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT * FROM vluchten");
$stmt->execute();

$vluchten = $stmt->fetchAll();


$status = 'aangevraagd';
$stmt = $pdo->prepare("SELECT COUNT(*) AS totaal FROM boekingen WHERE status = :status");
$stmt->bindParam(':status', $status);
$stmt->execute();

$openBoekingen = $stmt->fetch();

$status = 'in_afwachting';
$stmt = $pdo->prepare("SELECT COUNT(*) AS totaal FROM recensies WHERE status = :status");
$stmt->bindParam(':status', $status);
$stmt->execute();

$reviewsWachtrij = $stmt->fetch();

$status = 'nieuw';
$stmt = $pdo->prepare("SELECT COUNT(*) AS totaal FROM contact_berichten WHERE status = :status");
$stmt->bindParam(':status', $status);
$stmt->execute();

$nieuweBerichten = $stmt->fetch();

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


$stmt = $pdo->prepare("SELECT boekingen.*, gebruikers.voornaam, gebruikers.achternaam, vluchten.vlucht_nummer, vluchten.aankomst_luchthaven, vluchten.vertrek_luchthaven FROM boekingen LEFT JOIN gebruikers ON boekingen.gebruiker_id = gebruikers.id LEFT JOIN vluchten ON boekingen.vlucht_id = vluchten.id");

$stmt->execute();

$boekingen = $stmt->fetchAll();     

$stmt = $pdo->prepare("SELECT recensies.*, reizen.titel FROM recensies LEFT JOIN reizen ON recensies.reis_id = reizen.id ");
$stmt->execute();

$recensies = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT * FROM contact_berichten");
$stmt->execute();



$acties = $openBoekingen['totaal'] + $reviewsWachtrij['totaal'] + $nieuweBerichten['totaal'];