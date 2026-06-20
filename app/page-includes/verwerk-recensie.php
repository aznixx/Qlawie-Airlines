<?php
session_start();
require_once __DIR__ . "/../config/pdo.php";

if (!isset($_SESSION['gebruiker_id'])) {
    header("Location: ../../public/inloggen.php");
    exit;
}

$reis_id = $_POST['reis_id'] ?? '';
$rating = $_POST['rating'] ?? 5;
$bericht = trim($_POST['bericht'] ?? '');
$gebruiker_id = $_SESSION['gebruiker_id'];

if ($reis_id === '' || $bericht === '') {
    header("Location: ../../public/account.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM gebruikers WHERE id = :id");
$stmt->bindParam(':id', $gebruiker_id);
$stmt->execute();
$gebruiker = $stmt->fetch();

$naam = $gebruiker['voornaam'] . " " . $gebruiker['achternaam'];
$titel = "Review";
$status = "goedgekeurd";

$stmt = $pdo->prepare("INSERT INTO recensies
(reis_id, gebruiker_id, naam, rating, titel, bericht, status, aangemaakt_op, bijgewerkt_op)
VALUES
(:reis_id, :gebruiker_id, :naam, :rating, :titel, :bericht, :status, NOW(), NOW())");

$stmt->bindParam(':reis_id', $reis_id);
$stmt->bindParam(':gebruiker_id', $gebruiker_id);
$stmt->bindParam(':naam', $naam);
$stmt->bindParam(':rating', $rating);
$stmt->bindParam(':titel', $titel);
$stmt->bindParam(':bericht', $bericht);
$stmt->bindParam(':status', $status);
$stmt->execute();

header("Location: ../../public/account.php");
exit;
