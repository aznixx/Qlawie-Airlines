<?php
$pageTitle = "Vluchten - Qlawie Airlines";
require_once __DIR__ . "/../config/pdo.php";

$stmt = $pdo->prepare("SELECT vluchten.*, bestemmingen.naam, bestemmingen.stad, bestemmingen.land, bestemmingen.afbeelding
FROM vluchten
LEFT JOIN bestemmingen ON vluchten.bestemming_id = bestemmingen.id
WHERE vluchten.is_actief = 1
ORDER BY vluchten.vertrek_datum ASC");
$stmt->execute();
$vluchten = $stmt->fetchAll();
