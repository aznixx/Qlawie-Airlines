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
    $status = 'archief';

    $stmt = $pdo->prepare("UPDATE reizen SET status = :status, bijgewerkt_op = NOW() WHERE id = :id");
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: ../../public/admin/index.php#reizen");
    exit;
}

$bestemming_id = $_POST['bestemming_id'] ?? '';
$titel = trim($_POST['titel'] ?? '');
$slug = trim($_POST['slug'] ?? '');
$korte_beschrijving = trim($_POST['korte_beschrijving'] ?? '');
$beschrijving = trim($_POST['beschrijving'] ?? '');
$vertrek_luchthaven = trim($_POST['vertrek_luchthaven'] ?? '');
$aankomst_luchthaven = trim($_POST['aankomst_luchthaven'] ?? '');
$vertrekdatum = $_POST['vertrekdatum'] ?? '';
$terugkomstdatum = $_POST['terugkomstdatum'] ?? '';
$duur_dagen = $_POST['duur_dagen'] ?? 1;
$reisklasse = $_POST['reisklasse'] ?? 'Economy';
$prijs_vanaf = $_POST['prijs_vanaf'] ?? 0;
$beschikbare_plekken = $_POST['beschikbare_plekken'] ?? 0;
$bagage_inbegrepen = trim($_POST['bagage_inbegrepen'] ?? '');
$accommodatie = trim($_POST['accommodatie'] ?? '');
$afbeelding = trim($_POST['afbeelding'] ?? 'assets/landingpage.jpg');
$status = $_POST['status'] ?? 'actief';

if ($actie === 'wijzigen') {
    $stmt = $pdo->prepare("UPDATE reizen SET
    bestemming_id = :bestemming_id,
    titel = :titel,
    slug = :slug,
    korte_beschrijving = :korte_beschrijving,
    beschrijving = :beschrijving,
    vertrek_luchthaven = :vertrek_luchthaven,
    aankomst_luchthaven = :aankomst_luchthaven,
    vertrekdatum = :vertrekdatum,
    terugkomstdatum = :terugkomstdatum,
    duur_dagen = :duur_dagen,
    reisklasse = :reisklasse,
    prijs_vanaf = :prijs_vanaf,
    beschikbare_plekken = :beschikbare_plekken,
    bagage_inbegrepen = :bagage_inbegrepen,
    accommodatie = :accommodatie,
    afbeelding = :afbeelding,
    status = :status,
    bijgewerkt_op = NOW()
    WHERE id = :id");

    $stmt->bindParam(':id', $id);
} else {
    $stmt = $pdo->prepare("INSERT INTO reizen
    (bestemming_id, titel, slug, korte_beschrijving, beschrijving, vertrek_luchthaven, aankomst_luchthaven, vertrekdatum, terugkomstdatum, duur_dagen, reisklasse, prijs_vanaf, beschikbare_plekken, bagage_inbegrepen, accommodatie, afbeelding, status, aangemaakt_op, bijgewerkt_op)
    VALUES
    (:bestemming_id, :titel, :slug, :korte_beschrijving, :beschrijving, :vertrek_luchthaven, :aankomst_luchthaven, :vertrekdatum, :terugkomstdatum, :duur_dagen, :reisklasse, :prijs_vanaf, :beschikbare_plekken, :bagage_inbegrepen, :accommodatie, :afbeelding, :status, NOW(), NOW())");
}

$stmt->bindParam(':bestemming_id', $bestemming_id);
$stmt->bindParam(':titel', $titel);
$stmt->bindParam(':slug', $slug);
$stmt->bindParam(':korte_beschrijving', $korte_beschrijving);
$stmt->bindParam(':beschrijving', $beschrijving);
$stmt->bindParam(':vertrek_luchthaven', $vertrek_luchthaven);
$stmt->bindParam(':aankomst_luchthaven', $aankomst_luchthaven);
$stmt->bindParam(':vertrekdatum', $vertrekdatum);
$stmt->bindParam(':terugkomstdatum', $terugkomstdatum);
$stmt->bindParam(':duur_dagen', $duur_dagen);
$stmt->bindParam(':reisklasse', $reisklasse);
$stmt->bindParam(':prijs_vanaf', $prijs_vanaf);
$stmt->bindParam(':beschikbare_plekken', $beschikbare_plekken);
$stmt->bindParam(':bagage_inbegrepen', $bagage_inbegrepen);
$stmt->bindParam(':accommodatie', $accommodatie);
$stmt->bindParam(':afbeelding', $afbeelding);
$stmt->bindParam(':status', $status);
$stmt->execute();

header("Location: ../../public/admin/index.php#reizen");
exit;
