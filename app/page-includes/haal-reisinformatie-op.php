<?php
require_once __DIR__ . "/../config/pdo.php";

$slug = trim($_GET["slug"] ?? "");
$bestemmingNaam = trim($_GET["bestemming"] ?? "");

$bestemming = null;
$isFallback = false;
$notFound = false;

if ($slug !== "") {
    $stmt = $pdo->prepare("SELECT * FROM bestemmingen WHERE slug = ? AND is_actief = 1 LIMIT 1");
    $stmt->execute([$slug]);
    $bestemming = $stmt->fetch(PDO::FETCH_ASSOC);
} elseif ($bestemmingNaam !== "") {
    $stmt = $pdo->prepare("SELECT * FROM bestemmingen WHERE naam = ? AND is_actief = 1 LIMIT 1");
    $stmt->execute([$bestemmingNaam]);
    $bestemming = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $stmt = $pdo->query("SELECT * FROM bestemmingen WHERE is_actief = 1 ORDER BY id ASC LIMIT 1");
    $bestemming = $stmt->fetch(PDO::FETCH_ASSOC);
    $isFallback = $bestemming !== false;
}

if (!$bestemming) {
    $notFound = true;
    http_response_code(404);
    $pageTitle = "Reis niet gevonden - Qlawie Airlines";
} else {
    $pageTitle = $bestemming["naam"] . " - Qlawie Airlines";

    $prijsReis = $bestemming["prijs_reis"] !== null
        ? "&euro;" . number_format((float) $bestemming["prijs_reis"], 0, ",", ".")
        : "Prijs op aanvraag";
    $aantalDagen = (int) ($bestemming["aantal_dagen"] ?? 0);
    $klimaat = trim((string) ($bestemming["klimaat"] ?? ""));
    $klimaat = $klimaat !== "" ? $klimaat : "Meer informatie volgt";
    $highlights = array_values(array_filter(array_map("trim", explode(",", (string) ($bestemming["highlights"] ?? "")))));

    $eersteHighlight = $highlights[0] ?? $bestemming["stad"];
    $tweedeHighlight = $highlights[1] ?? $bestemming["land"];
    $derdeHighlight = $highlights[2] ?? $klimaat;

    if ($aantalDagen >= 3) {
        $middenDagenLabel = "Dag 2 t/m " . ($aantalDagen - 1);
    } elseif ($aantalDagen === 2) {
        $middenDagenLabel = "Dag 2";
    } else {
        $middenDagenLabel = "Tijdens je verblijf";
    }
}
