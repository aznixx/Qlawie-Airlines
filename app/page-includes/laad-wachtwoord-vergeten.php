<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pageTitle = "Wachtwoord vergeten - Qlawie Airlines";
$melding = $_SESSION['melding'] ?? '';
$reset_link = $_SESSION['reset_link'] ?? '';
unset($_SESSION['melding']);
unset($_SESSION['reset_link']);
