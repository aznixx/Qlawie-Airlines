<?php
session_start();

if (isset($_SESSION['gebruiker_id'])) {
    header("Location: index.php");
    exit;
}

$pageTitle = "Registreren - Qlawie Airlines";

$voornaam = '';
$achternaam = '';
$email = '';
$telefoon = '';
$wachtwoord = '';
$wachtwoord_h = '';
$foutmelding = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once __DIR__ . "/../config/pdo.php";

    $voornaam = trim($_POST['voornaam'] ?? '');
    $achternaam = trim($_POST['achternaam'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefoon = trim($_POST['telefoon'] ?? '');
    $wachtwoord = trim($_POST['wachtwoord'] ?? '');
    $wachtwoord_h = trim($_POST['wachtwoord_herhalen'] ?? '');

    if ($wachtwoord !== $wachtwoord_h) {
        $foutmelding = "WAChtwoorden komen niet overeen.";
    } else {
        $stmt = $pdo->query("SELECT id FROM gebruikers WHERE email = '$email'");

        if ($stmt->fetch()) {
            $foutmelding = 'Email wordt al gebruikt.';
        } else {
            $wachtwoord_hash = password_hash($wachtwoord, PASSWORD_DEFAULT);

            $stmt = $pdo->query("INSERT INTO gebruikers (voornaam, achternaam, email, telefoon, wachtwoord_hash) VALUES ('$voornaam', '$achternaam', '$email', '$telefoon', '$wachtwoord_hash')");
            $foutmelding = 'isgoed';
        }
    }
}
