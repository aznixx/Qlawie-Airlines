<?php
session_start();
require_once __DIR__ . "/../../config/pdo.php";

if (!isset($_SESSION['gebruiker_id']) || $_SESSION['rol'] !== 'beheerder') {
    header("Location: ../../../public/index.php");
    exit;
}

$recensie_id = $_POST['recensie_id'] ?? $_POST['id'] ?? '';
$status = $_POST['status'] ?? '';

if ($recensie_id === '' || $status === '') {
    header("Location: ../../../public/admin/orders.php");
    exit;
}

$stmt = $pdo->prepare("UPDATE recensies
SET status = :status
WHERE id = :id");
$stmt->bindParam(':status', $status);
$stmt->bindParam(':id', $recensie_id);
$stmt->execute();

header("Location: ../../../public/admin/orders.php");
exit;
