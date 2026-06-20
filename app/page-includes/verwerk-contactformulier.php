<?php
$pageTitle = "Contact - Qlawie Airlines";
require_once __DIR__ . "/../config/pdo.php";

$naam = '';
$email = '';
$bericht = '';
$foutmelding = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = trim($_POST['naam'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $bericht = trim($_POST['bericht'] ?? '');

    if ($naam === '' || $email === '' || $bericht === '') {
        $foutmelding = "Vul alle velden in.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO contact_berichten (naam, email, bericht) VALUES (:naam, :email, :bericht)");

        $stmt->bindParam(':naam', $naam);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':bericht', $bericht);

        $stmt->execute();

        header("Location: success_message.php");
        exit;
    }
}
