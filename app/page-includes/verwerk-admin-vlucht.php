<?php
session_start();
require_once __DIR__ . "/../config/pdo.php";

if (!isset($_SESSION['gebruiker_id']) || $_SESSION['rol'] !== 'beheerder') {
    header("Location: ../../public/index.php");
    exit;
}

$actie = $_POST['actie'] ?? '';
$id = $_POST['id'] ?? '';

if ($actie === 'verwijderen') {
    $is_actief = 0;

    $stmt = $pdo->prepare("UPDATE vluchten SET is_actief = :is_actief WHERE id = :id");
    $stmt->bindParam(':is_actief', $is_actief);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: ../../public/admin/index.php#vluchten");
    exit;
}

$bestemming_id = $_POST['bestemming_id'] ?? '';
$vertrek_luchthaven = trim($_POST['vertrek_luchthaven'] ?? '');
$aankomst_luchthaven = trim($_POST['aankomst_luchthaven'] ?? '');
$vertrek_datum = $_POST['vertrek_datum'] ?? '';
$aankomst_datum = $_POST['aankomst_datum'] ?? '';
$prijs = $_POST['prijs'] ?? 0;
$stoelen = $_POST['stoelen'] ?? 0;
$vlucht_nummer = trim($_POST['vlucht_nummer'] ?? '');
$is_actief = $_POST['is_actief'] ?? 1;

if ($actie === 'wijzigen') {
    $stmt = $pdo->prepare("UPDATE vluchten SET
    bestemming_id = :bestemming_id,
    vertrek_luchthaven = :vertrek_luchthaven,
    aankomst_luchthaven = :aankomst_luchthaven,
    vertrek_datum = :vertrek_datum,
    aankomst_datum = :aankomst_datum,
    prijs = :prijs,
    stoelen = :stoelen,
    vlucht_nummer = :vlucht_nummer,
    is_actief = :is_actief
    WHERE id = :id");

    $stmt->bindParam(':id', $id);
} else {
    $stmt = $pdo->prepare("INSERT INTO vluchten
    (bestemming_id, vertrek_luchthaven, aankomst_luchthaven, vertrek_datum, aankomst_datum, prijs, stoelen, vlucht_nummer, is_actief)
    VALUES
    (:bestemming_id, :vertrek_luchthaven, :aankomst_luchthaven, :vertrek_datum, :aankomst_datum, :prijs, :stoelen, :vlucht_nummer, :is_actief)");
}

$stmt->bindParam(':bestemming_id', $bestemming_id);
$stmt->bindParam(':vertrek_luchthaven', $vertrek_luchthaven);
$stmt->bindParam(':aankomst_luchthaven', $aankomst_luchthaven);
$stmt->bindParam(':vertrek_datum', $vertrek_datum);
$stmt->bindParam(':aankomst_datum', $aankomst_datum);
$stmt->bindParam(':prijs', $prijs);
$stmt->bindParam(':stoelen', $stoelen);
$stmt->bindParam(':vlucht_nummer', $vlucht_nummer);
$stmt->bindParam(':is_actief', $is_actief);
$stmt->execute();

header("Location: ../../public/admin/index.php#vluchten");
exit;
