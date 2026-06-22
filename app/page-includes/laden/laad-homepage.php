<?php
require_once __DIR__ . "/../../config/pdo.php";

$stmt = $pdo->prepare("SELECT * FROM reizen");
$stmt->execute();
$reizen = $stmt->fetchAll();
