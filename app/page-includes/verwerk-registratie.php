<?php
session_start();

if (isset($_SESSION['gebruiker_id'])) {
    header("Location: index.php");
    exit;
}

$pageTitle = "Registreren - Qlawie Airlines";


if (isset($_POST['login'])) {
    
    require_once __DIR__ . "/../config/pdo.php";

    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $telefoon = $_POST['telefoon'];
    $wachtwoord = $_POST['wachtwoord'];
    $wachtwoord_h = $_POST['wachtwoord_herhalen'];

    $stmt = $pdo->query("INSERT INTO gebruikers (voornaam, achternaam, email, telefoon, wachtwoord) VALUES ('$voornaam', '$achternaam', '$email', '$telefoon', '$wachtwoord')");


}
