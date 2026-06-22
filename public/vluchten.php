<?php
include __DIR__ . "/../app/page-includes/ophalen/haal-vluchten-op.php";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main>
    <section class="page-header">
        <div class="container">
            <p class="eyebrow">Vluchten</p>
            <h1>Losse vluchten</h1>
            <p>Boek alleen een vlucht, zonder hotel of extra pakket.</p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <?php if (empty($vluchten)) { ?>
                <div class="card">
                    <p class="text-bold">Er zijn nog geen vluchten beschikbaar.</p>
                    <p>Kom later terug of bekijk onze reizen.</p>
                    <a class="knop" href="reizen.php">Bekijk reizen</a>
                </div>
            <?php } else { ?>
                <div class="grid-3">
                    <?php foreach ($vluchten as $vlucht) { ?>
                        <a class="travel-card" href="vlucht-info.php?id=<?= $vlucht['id'] ?>">
                            <img src="<?= $vlucht['afbeelding'] ?>" alt="<?= $vlucht['aankomst_luchthaven'] ?>">
                            <div class="card-body">
                                <p class="eyebrow"><?= $vlucht['vlucht_nummer'] ?></p>
                                <h3><?= $vlucht['aankomst_luchthaven'] ?></h3>
                                <p><?= $vlucht['vertrek_luchthaven'] ?> naar <?= $vlucht['aankomst_luchthaven'] ?></p>
                                <p><?= $vlucht['vertrek_datum'] ?></p>
                                <div class="card-actions">
                                    <p class="text-bold accent-tekst">&euro;<?= $vlucht['prijs'] ?></p>
                                    <span class="knop">Bekijk vlucht</span>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
