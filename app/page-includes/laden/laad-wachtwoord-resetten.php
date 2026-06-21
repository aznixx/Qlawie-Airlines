<?php
$melding = '';
$token = $_GET['token'] ?? '';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['melding'])) {
    $melding = $_SESSION['melding'];
    unset($_SESSION['melding']);
}
