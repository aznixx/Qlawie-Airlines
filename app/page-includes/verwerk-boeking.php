<?php
session_start();
require_once __DIR__ . "/../config/pdo.php";

$reis_id = $_POST['reis_id'] ?? '';
$vlucht_id = $_POST['vlucht_id'] ?? '';
$naam = trim($_POST['naam'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefoon = trim($_POST['telefoon'] ?? '');
$reizigers = $_POST['reizigers'] ?? 1;
$reisklasse = $_POST['reisklasse'] ?? 'Economy';
$bagage = $_POST['bagage'] ?? 'Handbagage';
$opmerkingen = trim($_POST['opmerkingen'] ?? '');
$gebruiker_id = $_SESSION['gebruiker_id'] ?? null;

if ($naam === '' || $email === '') {
    $_SESSION['foutmelding'] = "Vul je naam en e-mail in.";
    header("Location: ../../public/boeken.php");
    exit;
}

if ($reis_id === '' && $vlucht_id === '') {
    $_SESSION['foutmelding'] = "Kies een reis of vlucht.";
    header("Location: ../../public/boeken.php");
    exit;
}

if ($reis_id !== '' && $vlucht_id !== '') {
    $_SESSION['foutmelding'] = "Kies een reis of een vlucht, niet allebei.";
    header("Location: ../../public/boeken.php");
    exit;
}

$prijs = 0;

if ($reis_id !== '') {
    $stmt = $pdo->prepare("SELECT * FROM reizen WHERE id = :id");
    $stmt->bindParam(':id', $reis_id);
    $stmt->execute();
    $reis = $stmt->fetch();

    if (!$reis) {
        $_SESSION['foutmelding'] = "Reis niet gevonden.";
        header("Location: ../../public/boeken.php");
        exit;
    }

    $prijs = $reis['prijs_vanaf'];
    $vlucht_id = null;
} else {
    $stmt = $pdo->prepare("SELECT * FROM vluchten WHERE id = :id");
    $stmt->bindParam(':id', $vlucht_id);
    $stmt->execute();
    $vlucht = $stmt->fetch();

    if (!$vlucht) {
        $_SESSION['foutmelding'] = "Vlucht niet gevonden.";
        header("Location: ../../public/boeken.php");
        exit;
    }

    $prijs = $vlucht['prijs'];
    $reis_id = null;
}

$totaalprijs = $prijs * $reizigers;
$boekingsnummer = "QL" . rand(100000, 999999);

$stmt = $pdo->prepare("INSERT INTO boekingen
(boekingsnummer, gebruiker_id, reis_id, vlucht_id, klant_naam, klant_email, klant_telefoon, aantal_reizigers, reisklasse, bagage_keuze, totaalprijs, status, opmerkingen, aangemaakt_op, bijgewerkt_op)
VALUES
(:boekingsnummer, :gebruiker_id, :reis_id, :vlucht_id, :klant_naam, :klant_email, :klant_telefoon, :aantal_reizigers, :reisklasse, :bagage_keuze, :totaalprijs, 'aangevraagd', :opmerkingen, NOW(), NOW())");

$stmt->bindParam(':boekingsnummer', $boekingsnummer);
if ($gebruiker_id === null) {
    $stmt->bindParam(':gebruiker_id', $gebruiker_id, PDO::PARAM_NULL);
} else {
    $stmt->bindParam(':gebruiker_id', $gebruiker_id);
}

if ($reis_id === null) {
    $stmt->bindParam(':reis_id', $reis_id, PDO::PARAM_NULL);
} else {
    $stmt->bindParam(':reis_id', $reis_id);
}

if ($vlucht_id === null) {
    $stmt->bindParam(':vlucht_id', $vlucht_id, PDO::PARAM_NULL);
} else {
    $stmt->bindParam(':vlucht_id', $vlucht_id);
}
$stmt->bindParam(':klant_naam', $naam);
$stmt->bindParam(':klant_email', $email);
$stmt->bindParam(':klant_telefoon', $telefoon);
$stmt->bindParam(':aantal_reizigers', $reizigers);
$stmt->bindParam(':reisklasse', $reisklasse);
$stmt->bindParam(':bagage_keuze', $bagage);
$stmt->bindParam(':totaalprijs', $totaalprijs);
$stmt->bindParam(':opmerkingen', $opmerkingen);
$stmt->execute();

if (isset($_SESSION['gebruiker_id'])) {
    header("Location: ../../public/account.php");
    exit;
}

header("Location: ../../public/success_message.php");
exit;
