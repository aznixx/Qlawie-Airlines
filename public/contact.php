<?php
include __DIR__ . "/../app/includes/navbar.php";

?>

<main>
    <section class="section">
        <div class="container">
            <p class="eyebrow">Contact</p>
            <h1>Stuur ons een bericht</h1>
            <p>Heb je een vraag over een reis of boeking? Stuur ons dan een bericht.</p>

            <?php include("../app/page-includes/laden/laad-foutmelding.php") ?>

            <form class="form" action="../app/page-includes/verwerken/verwerk-contactformulier.php" method="post">
                <input type="text" name="naam" placeholder="Naam">
                <input type="email" name="email" placeholder="E-mail">
                <input type="text" name="onderwerp" placeholder="Onderwerp">
                <textarea name="bericht" placeholder="Bericht"></textarea>
                <button class="knop" type="submit">Versturen</button>
            </form>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>