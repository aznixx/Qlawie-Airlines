<?php
$pageTitle = "Wachtwoord resetten - Qlawie Airlines";
$token = $_GET['token'] ?? '';
$melding = $_SESSION['melding'] ?? '';
unset($_SESSION['melding']);
