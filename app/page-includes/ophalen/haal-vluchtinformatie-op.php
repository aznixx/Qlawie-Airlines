<?php 
session_start();
require_once __DIR__ . "/../../config/pdo.php";

$id = $_GET['id'] ;

$stmt = $pdo->prepare("SELECT * FROM vluchten WHERE id = :id");
$stmt->bindParam(":id", $id);
$stmt->execute();

$vlucht = $stmt->fetch();
