<?php
require_once __DIR__ . "/../config/pdo.php";

$pagina = false;

$stmt = $pdo->prepare("SELECT * FROM site_paginas WHERE slug = :slug LIMIT 1");
$stmt->bindParam(':slug', $slug);
$stmt->execute();
$pagina = $stmt->fetch();

if ($pagina) {
    $pageTitle = $pagina['titel'] . " - Qlawie Airlines";
} else {
    $pageTitle = $titel . " - Qlawie Airlines";
}
