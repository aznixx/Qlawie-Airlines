<?php
session_start();
require_once __DIR__ . "/../../config/pdo.php";

if (!isset($_SESSION['gebruiker_id'])) {
    header("Location: ../../../public/inloggen.php");
    exit;
}

$boeking_id = $_POST['boeking_id'] ?? '';
$gebruiker_id = $_SESSION['gebruiker_id'];

if ($boeking_id !== '') {
$stmt = $pdo->prepare("UPDATE boekingen
    SET status = 'geannuleerd'
    WHERE id = :id AND gebruiker_id = :gebruiker_id");
    $stmt->bindParam(':id', $boeking_id);
    $stmt->bindParam(':gebruiker_id', $gebruiker_id);
    $stmt->execute();
}

header("Location: ../../../public/account.php");
exit;
