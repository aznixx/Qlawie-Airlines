<?php
session_start();
require_once __DIR__ . "/../../config/pdo.php";

if (!isset($_SESSION['gebruiker_id'])) {
    header("Location: ../../../public/inloggen.php");
    exit;
}

$boekingsnummer = $_POST['boekingsnummer'];
$gebruiker_id = $_SESSION['gebruiker_id'];

if ($boekingsnummer != '') {
    $stmt = $pdo->prepare("DELETE FROM boekingen WHERE boekingsnummer = :boekingsnummer AND gebruiker_id = :gebruiker_id");
    $stmt->bindParam(':boekingsnummer', $boekingsnummer);
    $stmt->bindParam(':gebruiker_id', $gebruiker_id);
    $stmt->execute();
}

header("Location: ../../../public/account.php");
exit;
