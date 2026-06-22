<?php
include __DIR__ . "/../app/page-includes/ophalen/haal-vluchtinformatie-op.php";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main>
    <?php if (!$vlucht) { ?>
        <section class="section">
            <div class="container card">
                <p class="eyebrow">Niet gevonden</p>
                <h1>Vlucht niet gevonden</h1>
                <p>Deze vlucht bestaat niet of is niet meer beschikbaar.</p>
                <a class="knop" href="vluchten.php">Terug naar vluchten</a>
            </div>
        </section>
    <?php } else { ?>
        <section class="detail-hero">
            <img src="assets/landingpage.jpg" alt="<?= $vlucht['aankomst_luchthaven'] ?>">
            <div class="overlay"></div>

            <div class="container detail-content detail-grid">
                <div>
                    <a class="knop-lijn" href="vluchten.php">Terug naar vluchten</a>
                    <p class="eyebrow">Qlawie vlucht</p>
                    <h1>Vlucht naar <?= $vlucht['aankomst_luchthaven'] ?></h1>
                    <p>Een losse vlucht met Qlawie Airlines. Geen hotel, geen pakket, gewoon je vlucht boeken.</p>
                </div>

                <div class="detail-panel">
                    <p class="eyebrow">Snel overzicht</p>
                    <div class="card">
                        <p class="eyebrow">Vlucht nummer</p>
                        <h3><?= $vlucht['vlucht_nummer'] ?></h3>
                    </div>
                    <div class="card">
                        <p class="eyebrow">Prijs</p>
                        <h3>&euro;<?= $vlucht['prijs'] ?></h3>
                    </div>
                    <div class="card">
                        <p class="eyebrow">Stoelen</p>
                        <h3><?= $vlucht['stoelen'] ?> beschikbaar</h3>
                    </div>
                    <a class="knop" href="boeken.php?vlucht_id=<?= $vlucht['id'] ?>">Boek deze vlucht</a>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container grid-2">
                <article class="card">
                    <p class="eyebrow">Vertrek</p>
                    <h2><?= $vlucht['vertrek_luchthaven'] ?></h2>
                    <p><?= $vlucht['vertrek_datum'] ?></p>
                </article>

                <article class="card">
                    <p class="eyebrow">Aankomst</p>
                    <h2><?= $vlucht['aankomst_luchthaven'] ?></h2>
                    <p><?= $vlucht['aankomst_datum'] ?></p>
                </article>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <p class="eyebrow">Informatie</p>
                <h2>Wat zit erbij?</h2>
                <div class="grid-3">
                    <div class="card">
                        <h3>Alleen vlucht</h3>
                        <p>Deze boeking is alleen voor de vlucht. Hotel en extra opties zitten hier niet bij.</p>
                    </div>
                    <div class="card">
                        <h3>Handbagage</h3>
                        <p>Je mag standaard handbagage meenemen tijdens je vlucht.</p>
                    </div>
                    <div class="card">
                        <h3>Qlawie Airlines</h3>
                        <p>Alle vluchten worden uitgevoerd door Qlawie Airlines.</p>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
