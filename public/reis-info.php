<?php
include __DIR__ . "/../app/page-includes/ophalen/haal-reisinformatie-op.php";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main>
    <?php if (!$reis) { ?>
        <section class="section">
            <div class="container card">
                <p class="eyebrow">Niet gevonden</p>
                <h1>Reis niet gevonden</h1>
                <p>Deze reis bestaat niet of is niet meer beschikbaar.</p>
                <a class="knop" href="reizen.php">Terug naar reizen</a>
            </div>
        </section>
    <?php } else { ?>
        <section class="detail-hero">
            <img src="<?= $reis['afbeelding'] ?>" alt="<?= $reis['titel'] ?>">
            <div class="overlay"></div>

            <div class="container detail-content detail-grid">
                <div>
                    <a class="knop-lijn" href="reizen.php">Terug naar reizen</a>
                    <p class="eyebrow">Reisoverzicht</p>
                    <h1><?= $reis['titel'] ?></h1>
                    <p><?= $reis['beschrijving'] ?></p>
                </div>

                <div class="detail-panel">
                    <p class="eyebrow">Snel overzicht</p>
                    <div class="card">
                        <p class="eyebrow">Reisduur</p>
                        <h3><?= $reis['duur_dagen'] ?> dagen</h3>
                    </div>
                    <div class="card">
                        <p class="eyebrow">Prijs</p>
                        <h3>&euro;<?= $reis['prijs_vanaf'] ?></h3>
                    </div>
                    <div class="card">
                        <p class="eyebrow">Type</p>
                        <h3>Pakketreis</h3>
                    </div>
                    <a class="knop" href="boeken.php?reis_id=<?= $reis['id'] ?>">Boek deze reis</a>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container grid-3">
                <article class="card">
                    <p class="eyebrow">Aankomst</p>
                    <h2><?= $reis['aankomst_luchthaven'] ?></h2>
                    <p>Vanaf <?= $reis['vertrek_luchthaven'] ?></p>
                </article>

                <article class="card">
                    <p class="eyebrow">Reisklasse</p>
                    <h2><?= $reis['reisklasse'] ?></h2>
                    <p>Bekijk de reis en kies daarna je boeking.</p>
                </article>

                <article class="card">
                    <p class="eyebrow">Plekken</p>
                    <h2><?= $reis['beschikbare_plekken'] ?></h2>
                    <p>Beschikbare plekken voor deze reis.</p>
                </article>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <p class="eyebrow">Reis</p>
                <h2><?= $reis['titel'] ?></h2>
                <p><?= $reis['beschrijving'] ?></p>

                <div class="grid-3">
                    <div class="card">
                        <h3>Vertrek</h3>
                        <p><?= $reis['vertrek_luchthaven'] ?> naar <?= $reis['aankomst_luchthaven'] ?></p>
                        <p><?= $reis['vertrekdatum'] ?></p>
                    </div>
                    <div class="card">
                        <h3>Terug</h3>
                        <p><?= $reis['terugkomstdatum'] ?></p>
                        <p><?= $reis['duur_dagen'] ?> dagen</p>
                    </div>
                    <div class="card">
                        <h3>Inbegrepen</h3>
                        <p><?= $reis['bagage_inbegrepen'] ?></p>
                        <p><?= $reis['reisklasse'] ?></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <p class="eyebrow">Reviews</p>
                <h2>Wat klanten zeggen</h2>

                <div class="grid-3">
                    <?php if (empty($recensies)) { ?>
                        <div class="card">
                            <p class="text-bold">Nog geen reviews.</p>
                        </div>
                    <?php } ?>

                    <?php foreach ($recensies as $recensie) { ?>
                        <article class="card">
                            <p class="eyebrow"><?= $recensie['rating'] ?> sterren</p>
                            <h3><?= $recensie['naam'] ?></h3>
                            <p><?= $recensie['bericht'] ?></p>
                        </article>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
