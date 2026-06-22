<?php
include __DIR__ . "/../app/includes/navbar.php";

$foutmelding = $_SESSION['foutmelding'] ;
unset($_SESSION['foutmelding']);
?>

<main>
    <section class="section">
        <div class="container">
            <p class="eyebrow">Account</p>
            <h1>Inloggen</h1>
            <p>Log in om je persoonlijke gegevens en geboekte reizen te bekijken.</p>

            <form class="form" action="../app/page-includes/verwerken/verwerk-inloggen.php" method="post">
                <label>
                    E-mail
                    <input type="email" name="email" autocomplete="email" required>
                </label>

                <label>
                    Wachtwoord
                    <input type="password" name="wachtwoord" required>
                </label>

                <button class="knop" type="submit">Inloggen</button>
            </form>

            <p>Nog geen account? <a class="text-bold accent-tekst" href="registreren.php">Maak een account aan</a></p>
            <p>Wachtwoord kwijt? <a class="text-bold accent-tekst" href="wachtwoord-vergeten.php">Reset je wachtwoord</a></p>

            <?php if ($foutmelding !== '') { ?>
                <p class="melding"><?= $foutmelding ?></p>
            <?php } ?>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
