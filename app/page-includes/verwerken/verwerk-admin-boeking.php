<?php
session_start();
require_once __DIR__ . "/../../config/pdo.php";

if (!isset($_SESSION['gebruiker_id']) || $_SESSION['rol'] !== 'beheerder') {
    header("Location: ../../../public/index.php");
    exit;
}

$boeking_id = $_POST['boeking_id'] ?? $_POST['id'] ?? '';
$status = $_POST['status'] ?? '';

if ($boeking_id === '' || $status === '') {
    header("Location: ../../../public/admin/boekingen.php");
    exit;
}

if ($status === 'geannuleerd') {
    $stmt = $pdo->prepare("UPDATE boekingen
    SET status = :status
    WHERE id = :id");
} else {
    $stmt = $pdo->prepare("UPDATE boekingen
    SET status = :status
    WHERE id = :id");
}

$stmt->bindParam(':status', $status);
$stmt->bindParam(':id', $boeking_id);
$stmt->execute();

header("Location: ../../../public/admin/boekingen.php");
exit;
