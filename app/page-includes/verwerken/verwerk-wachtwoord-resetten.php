<?php
session_start();
require_once __DIR__ . "/../../config/pdo.php";


// deze token is gewoon om te weten welke van wie is door middel van die token op te slaan in de database
// en daarna gewoon pakken vannuit de hidden input in wachtwoord-resetten.php
$token = $_POST['tijdelijkeKey'];
$wachtwoord = $_POST['wachtwoord'];
$wachtwoord_herhalen = $_POST['wachtwoord_herhalen'];

if ($wachtwoord == '') {
    $_SESSION['melding'] = "Vul alle velden in.";
    header("Location: ../../../public/wachtwoord-resetten.php");
    exit;
}

if ($wachtwoord !== $wachtwoord_herhalen) {
    $_SESSION['melding'] = "Wachtwoorden komen niet overeen.";
    header("Location: ../../../public/wachtwoord-resetten.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM wachtwoord_resets WHERE tijdelijkeKey = :tijdelijkeKey AND gebruikt_op IS NULL");
$stmt->bindParam(":tijdelijkeKey", $token);
$stmt->execute();
$reset = $stmt->fetch();

if (!$reset) {
    $_SESSION['melding'] = "Reset link is niet geldig.";
    header("Location: ../../../public/wachtwoord-vergeten.php");
    exit;
}

$gebruiker_id = $reset['gebruiker_id'];

$stmt = $pdo->prepare("UPDATE gebruikers SET wachtwoord = :wachtwoord WHERE id = :id");
$stmt->bindParam(':wachtwoord', $wachtwoord);
$stmt->bindParam(':id', $gebruiker_id);
$stmt->execute();

$stmt = $pdo->prepare("UPDATE wachtwoord_resets SET gebruikt_op = NOW() WHERE id = :id");
$stmt->bindParam(':id', $reset['id']);
$stmt->execute();

$_SESSION['foutmelding'] = "Je wachtwoord is aangepast. Log opnieuw in.";
header("Location: ../../../public/inloggen.php");
exit;
