<?php
session_start();
require_once __DIR__ . "/../../config/pdo.php";

if (isset($_SESSION['gebruiker_id'])) {
    header("Location: ../../../public/index.php");
    exit;
}

$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$email = $_POST['email'];
$telefoon = $_POST['telefoon'];
$wachtwoord = $_POST['wachtwoord'];
$wachtwoord_h = $_POST['wachtwoord_herhalen'];

if ($voornaam == '' || $achternaam == '' || $email == '' || $wachtwoord == '') {
    $_SESSION['foutmelding'] = "Vul alle verplichte velden in.";
    header("Location: ../../../public/registreren.php");
    exit;
}

if ($wachtwoord !== $wachtwoord_h) {
    $_SESSION['foutmelding'] = "Wachtwoorden komen niet overeen.";
    header("Location: ../../../public/registreren.php");
    exit;
}

$stmt = $pdo->prepare("SELECT id FROM gebruikers WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();

if ($stmt->fetch()) {
    $_SESSION['foutmelding'] = "Email wordt al gebruikt.";
    header("Location: ../../../public/registreren.php");
    exit;
}


$rol = "klant";

$stmt = $pdo->prepare("INSERT INTO gebruikers
(voornaam, achternaam, email, telefoon, wachtwoord, rol)
VALUES
(:voornaam, :achternaam, :email, :telefoon, :wachtwoord, :rol)");

$stmt->bindParam(':voornaam', $voornaam);
$stmt->bindParam(':achternaam', $achternaam);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':telefoon', $telefoon);
$stmt->bindParam(':wachtwoord', $wachtwoord);
$stmt->bindParam(':rol', $rol);
$stmt->execute();

header("Location: ../../../public/inloggen.php");
exit;
