<?php
session_start();
require_once __DIR__ . "/../../config/pdo.php";

$email = $_POST['email'] ;

if ($email === '') {
    $_SESSION['melding'] = "Vul je e-mail in.";
    header("Location: ../../../public/wachtwoord-vergeten.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM gebruikers WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$gebruiker = $stmt->fetch();

if ($gebruiker) {
    $gebruiker_id = $gebruiker['id'];

    $tijdelijkeKey = rand(0, 10);
    $stmt = $pdo->prepare("INSERT INTO wachtwoord_resets (gebruiker_id, tijdelijkeKey)
    VALUES (:gebruiker_id, :tijdKey)");
    $stmt->bindParam(':gebruiker_id', $gebruiker_id);
    $stmt->bindParam(":tijdKey", $tijdelijkeKey);
    $stmt->execute();

    $_SESSION['reset_link'] = "wachtwoord-resetten.php?token=" . $tijdelijkeKey;
}

$_SESSION['melding'] = "Als dit e-mailadres bestaat, kun je je wachtwoord resetten.";
header("Location: ../../../public/wachtwoord-vergeten.php");
exit;
