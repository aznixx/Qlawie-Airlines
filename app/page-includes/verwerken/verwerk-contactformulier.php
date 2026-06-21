<?php
session_start();

$pageTitle = "Contact - Qlawie Airlines";
require_once __DIR__ . "/../../config/pdo.php";

$naam = '';
$email = '';
$onderwerp = '';
$bericht = '';


$naam = $_POST['naam'] ?? '';
$email = $_POST['email'] ?? '';
$onderwerp = $_POST['onderwerp'] ?? '';
$bericht = $_POST['bericht'] ?? '';

if ($naam === '' || $email === '' || $onderwerp === '' || $bericht === '') {
    $_SESSION['foutmelding'] = "Vul alle velden in.";
    header("Location: ../../../public/contact.php");
    exit;
} else {
    $stmt = $pdo->prepare("INSERT INTO contact_berichten (naam, email, onderwerp, bericht) VALUES (:naam, :email, :onderwerp, :bericht)");

    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':onderwerp', $onderwerp);
    $stmt->bindParam(':bericht', $bericht);

    $stmt->execute();

    header("Location: ../../../public/success_message.php");
    exit;
}
