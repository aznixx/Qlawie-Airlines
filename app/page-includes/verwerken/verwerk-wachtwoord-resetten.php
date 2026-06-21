<?php
session_start();
require_once __DIR__ . "/../../config/pdo.php";

$token = $_POST['token'] ?? '';
$wachtwoord = $_POST['wachtwoord'] ?? '';
$wachtwoord_herhalen = $_POST['wachtwoord_herhalen'] ?? '';

if ($token === '' || $wachtwoord === '') {
    $_SESSION['melding'] = "Vul alle velden in.";
    header("Location: ../../../public/wachtwoord-resetten.php?token=" . $token);
    exit;
}

if ($wachtwoord !== $wachtwoord_herhalen) {
    $_SESSION['melding'] = "Wachtwoorden komen niet overeen.";
    header("Location: ../../../public/wachtwoord-resetten.php?token=" . $token);
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM wachtwoord_resets WHERE token_hash = :token AND gebruikt_op IS NULL AND verloopt_op > NOW() LIMIT 1");
$stmt->bindParam(':token', $token);
$stmt->execute();
$reset = $stmt->fetch();

if (!$reset) {
    $_SESSION['melding'] = "Reset link is niet geldig.";
    header("Location: ../../../public/wachtwoord-vergeten.php");
    exit;
}

$gebruiker_id = $reset['gebruiker_id'];
$wachtwoord_hash = password_hash($wachtwoord, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("UPDATE gebruikers SET wachtwoord_hash = :wachtwoord_hash WHERE id = :id");
$stmt->bindParam(':wachtwoord_hash', $wachtwoord_hash);
$stmt->bindParam(':id', $gebruiker_id);
$stmt->execute();

$stmt = $pdo->prepare("UPDATE wachtwoord_resets SET gebruikt_op = NOW() WHERE id = :id");
$stmt->bindParam(':id', $reset['id']);
$stmt->execute();

$_SESSION['foutmelding'] = "Je wachtwoord is aangepast. Log opnieuw in.";
header("Location: ../../../public/inloggen.php");
exit;
