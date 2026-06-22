<?php
include __DIR__ . "/../app/page-includes/ophalen/haal-reizen-op.php";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main>
    <section class="page-header">
        <div class="container">
            <p class="eyebrow">Reizen</p>
            <h1>Populaire reizen</h1>
            <p>Bekijk locaties en kies een reis die bij je past.</p>

            <form class="form" action="resultaten.php" method="get">
                <div class="form-grid">
                    <label>
                        Zoek op reis
                        <input type="text" name="zoek" placeholder="Zoek op reis">
                    </label>
                    <button class="knop" type="submit">Zoeken</button>
                </div>
            </form>
        </div>
    </section>

    <section class="section">
        <div class="container grid-3">
            <?php foreach ($reizen as $reis) { ?>
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
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
