<?php
session_start();

require_once __DIR__ . "/../../config/pdo.php";


$stmt = $pdo->prepare("SELECT * FROM gebruikers WHERE id = :gebruiker_id");
$stmt->bindParam(":gebruiker_id", $_SESSION['gebruiker_id']);
$stmt->execute();
$gebruiker = $stmt->fetch();

$stmt = $pdo->prepare("SELECT boekingen.*, reizen.*, vluchten.* FROM boekingen LEFT JOIN reizen ON boekingen.reis_id = reizen.id LEFT JOIN vluchten ON boekingen.vlucht_id = vluchten.id WHERE gebruiker_id = :gebruiker_id");
$stmt->bindParam(":gebruiker_id", $_SESSION['gebruiker_id']);
$stmt->execute();
$boekingen = $stmt->fetchAll();

$volgendeBoeking = $boekingen[0] ?? false;

$status = "bevestigd";

$stmt = $pdo->prepare("SELECT COUNT(*) AS totaal FROM boekingen WHERE gebruiker_id = :gebruiker_id AND status = :status");

$stmt->bindParam(":gebruiker_id", $_SESSION['gebruiker_id']);
$stmt->bindParam(":status", $status);

$stmt->execute();


$bevestigdeBoekingen = $stmt->fetch();

$status = "geannuleerd";

$stmt = $pdo->prepare("SELECT COUNT(*) AS totaal FROM boekingen WHERE gebruiker_id = :gebruiker_id AND status = :status");

$stmt->bindParam(":gebruiker_id", $_SESSION['gebruiker_id']);
$stmt->bindParam(":status", $status);

$stmt->execute();


$geannuleerdeBoekingen = $stmt->fetch();


$stmt = $pdo->prepare('SELECT COUNT(*) AS totaal FROM recensies WHERE gebruiker_id = :gebruiker_id');
$stmt->bindParam(":gebruiker_id", $_SESSION['gebruiker_id']);
$stmt->execute();

$reviewAantal = $stmt->fetch();
