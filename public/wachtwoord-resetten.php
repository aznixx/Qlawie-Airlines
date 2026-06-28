<?php
include __DIR__ . "/../app/page-includes/laden/laad-wachtwoord-resetten.php";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main>
    <section class="section">
        <div class="container">
            <p class="eyebrow">Account</p>
            <h1>Nieuw wachtwoord</h1>
            <p>Kies een nieuw wachtwoord.</p>

            <?php if (isset($_SESSION['melding'])) { ?>
                <p class="melding"><?= $_SESSION['melding'] ?></p>
            <?php } ?>

            <form class="wachtwoordForm form" action="../app/page-includes/verwerken/verwerk-wachtwoord-resetten.php" method="post">
                <input type="hidden" name="tijdelijkeKey" value="<?= $token ?>">

                <label>
                    Wachtwoord
                    <input type="password" name="wachtwoord" required>
                </label>

                <label>
                    Herhaal wachtwoord
                    <input type="password" name="wachtwoord_herhalen" required>
                </label>

                <button class="knop" type="submit">Wachtwoord opslaan</button>
            </form>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
