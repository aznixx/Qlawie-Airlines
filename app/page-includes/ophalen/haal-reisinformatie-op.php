<?php 
session_start();
require_once __DIR__ . "/../../config/pdo.php";

$id = $_GET['id'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM reizen WHERE id = :id");
$stmt->bindParam(":id", $id);
$stmt->execute();

$reis = $stmt->fetch();

$stmt = $pdo->prepare("SELECT * FROM recensies");
$stmt->execute();

$recensies = $stmt->fetchAll();