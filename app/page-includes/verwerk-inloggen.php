<?php
session_start();

if (isset($_SESSION['gebruiker_id'])) {
    header("Location: index.php");
    exit;
}

$pageTitle = "Inloggen - Qlawie Airlines";

$email = '';
$wachtwoord = '';
$wachtwoordCorrect = '';
$foutmelding = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . "/../config/pdo.php";

    $email = trim($_POST['email']);
    $wachtwoord = trim($_POST['wachtwoord']);

    if ($email === '' || $wachtwoord === '') {
        $foutmelding = "Vul je e-mail en wachtwoord in.";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM gebruikers WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $gebruiker = $stmt->fetch();

        if ($gebruiker && password_verify($wachtwoord, $gebruiker['wachtwoord_hash'])) {
            $wachtwoordCorrect = true;
        } else {
            $wachtwoordCorrect = false;
        }

        if ($wachtwoordCorrect) {
            $_SESSION['gebruiker_id'] = $gebruiker['id'];
            $_SESSION['rol'] = $gebruiker['rol'];

            header("Location: index.php");
            exit;
        }

        $foutmelding = "Onjuiste email of wachtwoord.";
    }
}
