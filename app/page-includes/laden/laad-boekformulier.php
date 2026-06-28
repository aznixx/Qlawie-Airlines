<?php
session_start();

require_once __DIR__ . "/../../config/pdo.php";

if (!isset($_SESSION['gebruiker_id'])) {
    header("Location: ../../../public/inloggen.php");
    exit;
}

$reis_id = $_GET['reis_id'] ?? '';
$vlucht_id = $_GET['vlucht_id'] ?? '';
$gebruiker_id = $_SESSION['gebruiker_id'];

$stmt = $pdo->prepare("SELECT * FROM vluchten");
$stmt->execute();

$vluchten = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT * FROM reizen");
$stmt->execute();

$reizen = $stmt->fetchAll();

if ($gebruiker_id !== '') {
    $stmt = $pdo->prepare("SELECT * FROM gebruikers WHERE id = :id");
    $stmt->bindParam(":id", $gebruiker_id);
    $stmt->execute();

    $gebruiker = $stmt->fetch();
}
