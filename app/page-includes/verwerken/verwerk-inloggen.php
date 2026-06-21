<?php
session_start();

if (isset($_SESSION['gebruiker_id'])) {
    header("Location: ../../../public/index.php");
    exit;
}

require_once __DIR__ . "/../../config/pdo.php";

$email = $_POST['email'] ?? '';
$wachtwoord = $_POST['wachtwoord'] ?? '';

if ($email === '' || $wachtwoord === '') {
    $_SESSION['foutmelding'] = "Vul je e-mail en wachtwoord in.";
    header("Location: ../../../public/inloggen.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM gebruikers WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$gebruiker = $stmt->fetch();

if ($gebruiker && password_verify($wachtwoord, $gebruiker['wachtwoord_hash'])) {
    $_SESSION['gebruiker_id'] = $gebruiker['id'];
    $_SESSION['rol'] = $gebruiker['rol'];

    if ($_SESSION['rol'] === 'beheerder') {
        header("Location: ../../../public/admin/admin_dashboard.php");
        exit;
    }

    header("Location: ../../../public/index.php");
    exit;
}

$_SESSION['foutmelding'] = "Onjuiste email of wachtwoord.";
header("Location: ../../../public/inloggen.php");
exit;
