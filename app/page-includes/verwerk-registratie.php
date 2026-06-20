<?php
session_start();
require_once __DIR__ . "/../config/pdo.php";

if (isset($_SESSION['gebruiker_id'])) {
    header("Location: ../../public/index.php");
    exit;
}

$voornaam = trim($_POST['voornaam'] ?? '');
$achternaam = trim($_POST['achternaam'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefoon = trim($_POST['telefoon'] ?? '');
$wachtwoord = $_POST['wachtwoord'] ?? '';
$wachtwoord_h = $_POST['wachtwoord_herhalen'] ?? '';

if ($voornaam === '' || $achternaam === '' || $email === '' || $wachtwoord === '') {
    $_SESSION['foutmelding'] = "Vul alle verplichte velden in.";
    header("Location: ../../public/registreren.php");
    exit;
}

if ($wachtwoord !== $wachtwoord_h) {
    $_SESSION['foutmelding'] = "Wachtwoorden komen niet overeen.";
    header("Location: ../../public/registreren.php");
    exit;
}

$stmt = $pdo->prepare("SELECT id FROM gebruikers WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();

if ($stmt->fetch()) {
    $_SESSION['foutmelding'] = "Email wordt al gebruikt.";
    header("Location: ../../public/registreren.php");
    exit;
}

$wachtwoord_hash = password_hash($wachtwoord, PASSWORD_DEFAULT);
$rol = "klant";
$is_actief = 1;

$stmt = $pdo->prepare("INSERT INTO gebruikers
(voornaam, achternaam, email, telefoon, wachtwoord_hash, rol, is_actief, aangemaakt_op, bijgewerkt_op)
VALUES
(:voornaam, :achternaam, :email, :telefoon, :wachtwoord_hash, :rol, :is_actief, NOW(), NOW())");

$stmt->bindParam(':voornaam', $voornaam);
$stmt->bindParam(':achternaam', $achternaam);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':telefoon', $telefoon);
$stmt->bindParam(':wachtwoord_hash', $wachtwoord_hash);
$stmt->bindParam(':rol', $rol);
$stmt->bindParam(':is_actief', $is_actief);
$stmt->execute();

header("Location: ../../public/inloggen.php");
exit;
