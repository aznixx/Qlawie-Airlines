<?php
session_start();
require_once __DIR__ . "/../../config/pdo.php";

if (!isset($_SESSION['gebruiker_id']) || $_SESSION['rol'] !== 'beheerder') {
    header("Location: ../../../public/index.php");
    exit;
}

$actie = $_POST['actie'];
$id = $_POST['id'];

if ($actie === 'verwijderen') {
    $stmt = $pdo->prepare("DELETE FROM vluchten WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: ../../../public/admin/vluchten.php");
    exit;
}

$vertrek_luchthaven = $_POST['vertrek_luchthaven'];
$aankomst_luchthaven = $_POST['aankomst_luchthaven'];
$vertrek_datum = $_POST['vertrek_datum'];
$aankomst_datum = $_POST['aankomst_datum'];
$prijs = $_POST['prijs'] ?? 0;
$stoelen = $_POST['stoelen'] ?? 0;
$vlucht_nummer = $_POST['vlucht_nummer'];

if ($actie === 'wijzigen') {
    $stmt = $pdo->prepare("UPDATE vluchten SET
    vertrek_luchthaven = :vertrek_luchthaven,
    aankomst_luchthaven = :aankomst_luchthaven,
    vertrek_datum = :vertrek_datum,
    aankomst_datum = :aankomst_datum,
    prijs = :prijs,
    stoelen = :stoelen,
    vlucht_nummer = :vlucht_nummer
    WHERE id = :id");

    $stmt->bindParam(':id', $id);
} else {
    $stmt = $pdo->prepare("INSERT INTO vluchten
    (vertrek_luchthaven, aankomst_luchthaven, vertrek_datum, aankomst_datum, prijs, stoelen, vlucht_nummer)
    VALUES
    (:vertrek_luchthaven, :aankomst_luchthaven, :vertrek_datum, :aankomst_datum, :prijs, :stoelen, :vlucht_nummer)");
}

$stmt->bindParam(':vertrek_luchthaven', $vertrek_luchthaven);
$stmt->bindParam(':aankomst_luchthaven', $aankomst_luchthaven);
$stmt->bindParam(':vertrek_datum', $vertrek_datum);
$stmt->bindParam(':aankomst_datum', $aankomst_datum);
$stmt->bindParam(':prijs', $prijs);
$stmt->bindParam(':stoelen', $stoelen);
$stmt->bindParam(':vlucht_nummer', $vlucht_nummer);
$stmt->execute();

header("Location: ../../../public/admin/vluchten.php");
exit;
