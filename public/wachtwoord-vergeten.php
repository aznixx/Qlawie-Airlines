<?php
include __DIR__ . "/../app/includes/navbar.php";
?>

<main>
    <section class="section">
        <div class="container">
            <p class="eyebrow">Account</p>
            <h1>Wachtwoord vergeten</h1>
            <p>Vul je e-mail in om je wachtwoord te resetten.</p>

            <?php if (isset($_SESSION['melding'])) { ?>
                <p class="melding"><?= $_SESSION['melding'] ?></p>
                <?php unset($_SESSION['melding'])?>
            <?php } ?>

            <?php if (isset($_SESSION['reset_link'])) { ?>
                <a class="knop" href="<?= $_SESSION['reset_link'] ?>">Reset wachtwoord</a>
                <?php unset($_SESSION['reset_link'])?>
            <?php } ?>

            <form class="form" action="../app/page-includes/verwerken/verwerk-wachtwoord-vergeten.php" method="post">
                <label>
                    E-mail
                    <input type="email" name="email" required>
                </label>

                <button class="knop" type="submit">Reset aanvragen</button>
            </form>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
