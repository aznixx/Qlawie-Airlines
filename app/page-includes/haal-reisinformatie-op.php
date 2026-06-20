<?php
require_once __DIR__ . "/../config/pdo.php";

$slug = trim($_GET["slug"] ?? "");
$bestemmingNaam = trim($_GET["bestemming"] ?? "");
$bestemming = false;
$reis = false;
$recensies = [];
$notFound = false;

if ($slug !== "") {
    $stmt = $pdo->prepare("SELECT * FROM bestemmingen WHERE slug = :slug AND is_actief = 1 LIMIT 1");
    $stmt->bindParam(':slug', $slug);
    $stmt->execute();
    $bestemming = $stmt->fetch();
} elseif ($bestemmingNaam !== "") {
    $stmt = $pdo->prepare("SELECT * FROM bestemmingen WHERE naam = :naam AND is_actief = 1 LIMIT 1");
    $stmt->bindParam(':naam', $bestemmingNaam);
    $stmt->execute();
    $bestemming = $stmt->fetch();
} else {
    $stmt = $pdo->prepare("SELECT * FROM bestemmingen WHERE is_actief = 1 ORDER BY id ASC LIMIT 1");
    $stmt->execute();
    $bestemming = $stmt->fetch();
}

if (!$bestemming) {
    $notFound = true;
    http_response_code(404);
    $pageTitle = "Reis niet gevonden - Qlawie Airlines";
} else {
    $pageTitle = $bestemming["naam"] . " - Qlawie Airlines";
    $bestemming_id = $bestemming['id'];

    $stmt = $pdo->prepare("SELECT * FROM reizen WHERE bestemming_id = :bestemming_id AND status = 'actief' LIMIT 1");
    $stmt->bindParam(':bestemming_id', $bestemming_id);
    $stmt->execute();
    $reis = $stmt->fetch();

    if ($reis) {
        $reis_id = $reis['id'];

        $stmt = $pdo->prepare("SELECT * FROM recensies WHERE reis_id = :reis_id AND status = 'goedgekeurd' ORDER BY id DESC");
        $stmt->bindParam(':reis_id', $reis_id);
        $stmt->execute();
        $recensies = $stmt->fetchAll();
    }
}
