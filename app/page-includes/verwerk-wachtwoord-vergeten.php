<?php
session_start();
require_once __DIR__ . "/../config/pdo.php";

$email = trim($_POST['email'] ?? '');

if ($email === '') {
    $_SESSION['melding'] = "Vul je e-mail in.";
    header("Location: ../../public/wachtwoord-vergeten.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM gebruikers WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$gebruiker = $stmt->fetch();

if ($gebruiker) {
    $gebruiker_id = $gebruiker['id'];
    $token = rand(100000, 999999);

    $stmt = $pdo->prepare("INSERT INTO wachtwoord_resets (gebruiker_id, token_hash, verloopt_op, aangemaakt_op)
    VALUES (:gebruiker_id, :token_hash, DATE_ADD(NOW(), INTERVAL 1 HOUR), NOW())");
    $stmt->bindParam(':gebruiker_id', $gebruiker_id);
    $stmt->bindParam(':token_hash', $token);
    $stmt->execute();

    $_SESSION['reset_link'] = "wachtwoord-resetten.php?token=" . $token;
}

$_SESSION['melding'] = "Als dit e-mailadres bestaat, kun je je wachtwoord resetten.";
header("Location: ../../public/wachtwoord-vergeten.php");
exit;
