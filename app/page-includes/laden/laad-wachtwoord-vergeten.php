<?php
$melding = '';
$reset_link = '';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['melding'])) {
    $melding = $_SESSION['melding'];
    unset($_SESSION['melding']);
}

if (isset($_SESSION['reset_link'])) {
    $reset_link = $_SESSION['reset_link'];
    unset($_SESSION['reset_link']);
}
