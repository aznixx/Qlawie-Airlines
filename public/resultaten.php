<?php
include __DIR__ . "/../app/page-includes/ophalen/haal-zoekresultaten-op.php";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main>
    <section class="page-header">
        <div class="container">
            <p class="eyebrow">Resultaten</p>
            <h1>Gevonden reizen</h1>
            <p>Zoekterm: <?php echo $zoek ?: "alles"; ?></p>
            <?php if ($vertrekdatum != '') { ?>
                <p>Vertrekdatum: <?= $vertrekdatum ?></p>
            <?php } ?>
            <?php if ($terugkomstdatum != '') { ?>
                <p>Terugkomstdatum: <?= $terugkomstdatum ?></p>
            <?php } ?>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <?php if (empty($resultaten)) { ?>
                <div class="card">
                    <p class="text-bold">Geen reizen gevonden.</p>
                    <p>Probeer een andere reis.</p>
                    <a class="knop" href="reizen.php">Terug naar reizen</a>
                </div>
            <?php } ?>

            <div class="grid-3">
                <?php foreach ($resultaten as $reis) { ?>
                    <a class="travel-card" href="reis-info.php?id=<?= $reis['id'] ?>">
                        <img src="<?= $reis['afbeelding'] ?>" alt="<?= $reis['titel'] ?>">
                        <div class="card-body">
                            <p class="eyebrow"><?= $reis['duur_dagen'] ?> dagen</p>
                            <h3><?= $reis['titel'] ?></h3>
                            <p><?= $reis['korte_beschrijving'] ?></p>
                            <div class="card-actions">
                                <p class="text-bold accent-tekst">&euro;<?= $reis['prijs_vanaf'] ?></p>
                                <span class="knop">Bekijk reis</span>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
