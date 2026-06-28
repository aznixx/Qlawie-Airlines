<?php
session_start();
require_once __DIR__ . "/../../config/pdo.php";

if (!isset($_SESSION['gebruiker_id']) || $_SESSION['rol'] !== 'beheerder') {
    header("Location: ../../../public/index.php");
    exit;
}

$bericht_id = $_POST['bericht_id'] ?? $_POST['id'] ;
$status = $_POST['status'] ;

if ($bericht_id == '' || $status == '') {
    header("Location: ../../../public/admin/berichten.php");
    exit;
}

if ($status == 'beantwoord') {
    $stmt = $pdo->prepare("UPDATE contact_berichten
    SET status = :status
    WHERE id = :id");

    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $bericht_id);
    $stmt->execute();
} else if ($status == 'gelezen') {
    $stmt = $pdo->prepare("UPDATE contact_berichten
    SET status = :status
    WHERE id = :id");

    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $bericht_id);
    $stmt->execute();
} else {
    $stmt = $pdo->prepare("DELETE FROM contact_berichten WHERE id = :id");

    $stmt->bindParam(':id', $bericht_id);
    $stmt->execute();
}



header("Location: ../../../public/admin/berichten.php");
exit;
