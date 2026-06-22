<?php
include __DIR__ . "/../app/includes/navbar.php";

$foutmelding = $_SESSION['foutmelding'] ;
unset($_SESSION['foutmelding']);
?>

<main>
    <section class="section">
        <div class="container">
            <p class="eyebrow">Account</p>
            <h1>Account aanmaken</h1>
            <p>Maak een account aan om je gegevens en reizen later makkelijk te beheren.</p>

            <?php if ($foutmelding !== '') { ?>
                <p class="melding"><?= $foutmelding ?></p>
            <?php } ?>

            <form class="wachtwoordForm form form-grid" action="../app/page-includes/verwerken/verwerk-registratie.php" method="post">
                <label>
                    Voornaam
                    <input type="text" name="voornaam" autocomplete="given-name" required>
                </label>

                <label>
                    Achternaam
                    <input type="text" name="achternaam" autocomplete="family-name" required>
                </label>

                <label>
                    E-mail
                    <input type="email" name="email" autocomplete="email" required>
                </label>

                <label>
                    Telefoon
                    <input type="tel" name="telefoon" autocomplete="tel">
                </label>

                <label>
                    Wachtwoord
                    <input type="password" name="wachtwoord" autocomplete="new-password" required>
                </label>

                <label>
                    Herhaal wachtwoord
                    <input type="password" name="wachtwoord_herhalen" autocomplete="new-password" required>
                </label>

                <button class="knop veld-groot" type="submit">Account aanmaken</button>
            </form>

            <p>Heb je al een account? <a class="text-bold accent-tekst" href="inloggen.php">Log hier in</a></p>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
