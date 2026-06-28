<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? "Qlawie Airlines"; ?></title>
    <link rel="stylesheet" href="/public/styles.css">
</head>

<body>
    <nav class="site-nav">
        <div class="container">
            <div class="nav-inner">
                <a class="logo" href="/public/index.php" aria-label="Qlawie Airlines home">
                    <img src="/public/assets/logo.png" alt="Qlawie Airlines logo">
                </a>

                <div class="nav-links">
                    <a href="/public/index.php">Home</a>
                    <a href="/public/reizen.php">Reizen</a>
                    <a href="/public/vluchten.php">Vluchten</a>
                    <a href="/public/over-ons.php">Over ons</a>
                    <a href="/public/contact.php">Contact</a>
                </div>

                <div class="nav-actions">
                    <?php if (!isset($_SESSION['gebruiker_id'])) { ?>
                        <a class="knop" href="/public/inloggen.php">Inloggen</a>
                        <a class="knop" href="/public/registreren.php">Registreren</a>
                    <?php } else { ?>
                        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'beheerder') { ?>
                            <a class="knop-donker" href="/public/admin/admin_dashboard.php">Admin</a>
                        <?php } ?>

                        <a class="knop" href="/public/account.php">Mijn Account</a>
                        <a class="knop" href="/public/uitloggen.php">Uitloggen</a>
                    <?php } ?>

                    <button id="menuKnop" class="menu-knop knop-lijn" type="button">Menu</button>
                </div>
            </div>

            <div id="mobielMenu" class="mobiel-menu hidden">
                <a href="/public/index.php">Home</a>
                <a href="/public/reizen.php">Reizen</a>
                <a href="/public/vluchten.php">Vluchten</a>
                <a href="/public/over-ons.php">Over ons</a>
                <a href="/public/contact.php">Contact</a>
            </div>
        </div>
    </nav>
