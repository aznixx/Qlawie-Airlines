<?php
ob_start();
$pageTitle = "Contact - Qlawie Airlines";
require_once __DIR__ . "/../config/pdo.php";

$errors = [];


$naam = $_POST['naam'];
$email = $_POST['email'];
$bericht = $_POST['bericht'];



$stmt = $pdo->query("INSERT INTO contact_berichten (naam, email, bericht) VALUES ('$naam', '$email', '$bericht')");

header('Location: success_message.php');

require_once __DIR__ . "/../includes/navbar.php";
