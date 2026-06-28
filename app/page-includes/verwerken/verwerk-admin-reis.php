<?php
session_start();
require_once __DIR__ . "/../../config/pdo.php";

if (!isset($_SESSION['gebruiker_id']) || $_SESSION['rol'] !== 'beheerder') {
    header("Location: ../../../public/index.php");
    exit;
}

$actie = $_POST['actie'] ;
$id = $_POST['id'] ;

if ($actie == 'verwijderen') {
    $stmt = $pdo->prepare("DELETE FROM reizen WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: ../../../public/admin/reizen.php");
    exit;
}

$titel = $_POST['titel'] ;
$korte_beschrijving = $_POST['korte_beschrijving'] ;
$beschrijving = $_POST['beschrijving'] ;
$vertrek_luchthaven = $_POST['vertrek_luchthaven'] ;
$aankomst_luchthaven = $_POST['aankomst_luchthaven'] ;
$vertrekdatum = $_POST['vertrekdatum'] ;
$terugkomstdatum = $_POST['terugkomstdatum'] ;
$duur_dagen = $_POST['duur_dagen'];
$reisklasse = $_POST['reisklasse'];
$prijs_vanaf = $_POST['prijs_vanaf'];
$beschikbare_plekken = $_POST['beschikbare_plekken'];
$bagage_inbegrepen = $_POST['bagage_inbegrepen'] ;
$afbeelding = $_POST['afbeelding'];

if ($actie == 'wijzigen') {
    $stmt = $pdo->prepare("UPDATE reizen SET
    titel = :titel,
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
    afbeelding = :afbeelding
    WHERE id = :id");

    $stmt->bindParam(':id', $id);
} else {
$stmt = $pdo->prepare("INSERT INTO reizen
(titel, korte_beschrijving, beschrijving, vertrek_luchthaven, aankomst_luchthaven, vertrekdatum, terugkomstdatum, duur_dagen, reisklasse, prijs_vanaf, beschikbare_plekken, bagage_inbegrepen, afbeelding)
VALUES
(:titel, :korte_beschrijving, :beschrijving, :vertrek_luchthaven, :aankomst_luchthaven, :vertrekdatum, :terugkomstdatum, :duur_dagen, :reisklasse, :prijs_vanaf, :beschikbare_plekken, :bagage_inbegrepen, :afbeelding)");
}

$stmt->bindParam(':titel', $titel);
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
$stmt->bindParam(':afbeelding', $afbeelding);
$stmt->execute();

header("Location: ../../../public/admin/reizen.php");
exit;
