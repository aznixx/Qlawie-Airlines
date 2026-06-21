<?php 
require_once __DIR__ . "/../../config/pdo.php";

$stmt = $pdo->prepare("SELECT * FROM vluchten");
$stmt->execute();

$vluchten = $stmt->fetchAll();
