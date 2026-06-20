<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['gebruiker_id'])) {
    header("Location: inloggen.php");
    exit;
}

$pageTitle = "Mijn account - Qlawie Airlines";
require_once __DIR__ . "/../config/pdo.php";

$gebruiker_id = $_SESSION['gebruiker_id'];

$stmt = $pdo->prepare("SELECT * FROM gebruikers WHERE id = :id");
$stmt->bindParam(':id', $gebruiker_id);
$stmt->execute();
$gebruiker = $stmt->fetch();

$stmt = $pdo->prepare("SELECT boekingen.*, reizen.titel, reizen.vertrekdatum, vluchten.vlucht_nummer, vluchten.vertrek_datum, bestemmingen.stad
FROM boekingen
LEFT JOIN reizen ON boekingen.reis_id = reizen.id
LEFT JOIN vluchten ON boekingen.vlucht_id = vluchten.id
LEFT JOIN bestemmingen ON vluchten.bestemming_id = bestemmingen.id
WHERE boekingen.gebruiker_id = :gebruiker_id
ORDER BY boekingen.id DESC");
$stmt->bindParam(':gebruiker_id', $gebruiker_id);
$stmt->execute();
$boekingen = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT COUNT(*) AS totaal FROM recensies WHERE gebruiker_id = :gebruiker_id");
$stmt->bindParam(':gebruiker_id', $gebruiker_id);
$stmt->execute();
$reviewAantal = $stmt->fetch();

$actieveBoekingen = 0;
$geannuleerdeBoekingen = 0;
$volgendeBoeking = false;

foreach ($boekingen as $boeking) {
    if ($boeking['status'] === 'geannuleerd') {
        $geannuleerdeBoekingen++;
    } else {
        $actieveBoekingen++;

        if (!$volgendeBoeking) {
            $volgendeBoeking = $boeking;
        }
    }
}
