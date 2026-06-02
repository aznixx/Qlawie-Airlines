<?php
session_start();

if (isset($_SESSION['gebruiker_id'])) {
    header("Location: index.php");
    exit;
}

$pageTitle = "Inloggen - Qlawie Airlines";


if (isset($_POST['login'])) {
    require_once __DIR__ . "/../config/pdo.php";

    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    $stmt = $pdo->query("SELECT * FROM gebruikers WHERE email = '$email'");
    $gebruiker = $stmt->fetch();


    $_SESSION['gebruiker_id'] = $gebruiker['id'];
    $_SESSION['rol'] = $gebruiker['rol'];

    header("Location: index.php");
    exit;
}
