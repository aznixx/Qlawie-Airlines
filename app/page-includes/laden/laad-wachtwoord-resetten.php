<?php
$melding = '';
$token = $_GET['token'] ;

if (isset($_SESSION['melding'])) {
    $melding = $_SESSION['melding'];
    unset($_SESSION['melding']);
}
