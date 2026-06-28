<?php
include __DIR__ . "/../app/page-includes/laden/laad-account.php";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main>
    <section class="page-header">
        <div class="container grid-2">
            <div>
                <p class="eyebrow">Mijn Qlawie</p>
                <h1>Account dashboard</h1>
                <p>Bekijk je gegevens en boekingen.</p>
            </div>

            <div class="card card-dark">
                <p class="eyebrow">Volgende boeking</p>
                <?php if ($volgendeBoeking) { ?>
                    <?php
                    $titel = $volgendeBoeking['titel'];
                    $datum = $volgendeBoeking['vertrekdatum'];

                    if ($volgendeBoeking['vlucht_id']) {
                        $titel = "Vlucht naar " . $volgendeBoeking['aankomst_luchthaven'];
                        $datum = $volgendeBoeking['vertrek_datum'];
                    }
                    ?>
                    <h2><?= $titel ?></h2>
                    <p><strong>Datum:</strong> <?= $datum ?></p>
                    <p><strong>Status:</strong> <?= $volgendeBoeking['status'] ?></p>
                <?php } else { ?>
                    <h2>Geen boeking</h2>
                    <p>Je hebt nog geen actieve boeking.</p>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container account-layout">
            <aside class="card account-sidebar">
                <p class="eyebrow">Gebruiker</p>
                <h3><?= $gebruiker['voornaam'] ?> <?= $gebruiker['achternaam'] ?></h3>
                <p><?= $gebruiker['email'] ?></p>
                <p><strong>Telefoon:</strong> <?= $gebruiker['telefoon'] ?></p>
                <p><strong>Rol:</strong> <?= $gebruiker['rol'] ?></p>
                <p><strong>Boekingen:</strong> <?= count($boekingen) ?></p>
                <a class="knop-lijn" href="uitloggen.php">Uitloggen</a>
            </aside>

            <div>
                <div class="grid-3">
                    <article class="card">
                        <p class="eyebrow">Bevestigd</p>
                        <h2><?= $bevestigdeBoekingen['totaal'] ?></h2>
                    </article>
                    <article class="card">
                        <p class="eyebrow">Geannuleerd</p>
                        <h2><?= $geannuleerdeBoekingen['totaal'] ?></h2>
                    </article>
                    <article class="card">
                        <p class="eyebrow">Reviews</p>
                        <h2><?= $reviewAantal['totaal'] ?></h2>
                    </article>
                </div>

                <section class="card">
                    <div class="card-actions">
                        <div>
                            <p class="eyebrow">Boekingen</p>
                            <h2>Mijn boekingen</h2>
                        </div>
                        <div class="button-row">
                            <a class="knop-donker" href="reizen.php">Nieuwe reis</a>
                            <a class="knop" href="vluchten.php">Nieuwe vlucht</a>
                        </div>
                    </div>

                    <?php if (empty($boekingen)) { ?>
                        <p class="text-bold">Je hebt nog geen boekingen.</p>
                    <?php } ?>

                    <?php foreach ($boekingen as $boeking) { ?>
                        <?php
                        $titel = $boeking['titel'];
                        $datum = $boeking['vertrekdatum'];
                        $soort = "Pakketreis";

                        if ($boeking['vlucht_id']) {
                            $titel = "Vlucht naar " . $boeking['aankomst_luchthaven'];
                            $datum = $boeking['vertrek_datum'];
                            $soort = "Losse vlucht";
                        }
                        ?>
                        <article class="booking-row">
                            <div>
                                <h3><?= $titel ?></h3>
                                <p><?= $boeking['aantal_reizigers'] ?> reiziger(s) - <?= $soort ?></p>
                                <p class="text-small">Boeking: <?= $boeking['boekingsnummer'] ?></p>
                            </div>
                            <p class="text-bold"><?= $datum ?></p>
                            <p class="text-bold accent-tekst"><?= $boeking['status'] ?></p>
                            <div>
                                <?php if ($boeking['status'] !== 'geannuleerd') { ?>
                                    <form action="../app/page-includes/verwerken/verwerk-annuleren-boeking.php" method="post">
                                        <input type="hidden" name="boekingsnummer" value="<?= $boeking['boekingsnummer'] ?>">
                                        <button class="knop-donker" type="submit">Annuleren</button>
                                    </form>
                                <?php } else { ?>
                                    <p class="text-bold">Geannuleerd</p>
                                <?php } ?>

                                <?php if ($boeking['status'] == 'geannuleerd') {?>
                                <form action="../app/page-includes/verwerken/verwerk-verwijder-boeking.php" method="post">
                                    <input type="hidden" name="boekingsnummer" value="<?= $boeking['boekingsnummer'] ?>">
                                    <button class="knop-donker" type="submit">Verwijderen</button>
                                </form>
                                <?php }?>
                            </div>
                        </article>
                    <?php } ?>
                </section>

                <section class="card">
                    <p class="eyebrow">Review</p>
                    <h2>Plaats een recensie</h2>

                    <?php
                    $heeftReisBoeking = false;

                    foreach ($boekingen as $boeking) {
                        if (!$boeking['vlucht_id']) {
                            $heeftReisBoeking = true;
                        }
                    }
                    ?>

                    <?php if ($heeftReisBoeking) { ?>
                        <form class="form" action="../app/page-includes/verwerken/verwerk-recensie.php" method="post">
                            <div class="form-grid">
                                <label>
                                    Reis
                                    <select name="reis_id">
                                        <?php foreach ($boekingen as $boeking) { ?>
                                            <?php if (!$boeking['vlucht_id']) { ?>
                                                <option value="<?= $boeking['reis_id'] ?>"><?= $boeking['titel'] ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </label>

                                <label>
                                    Score
                                    <select name="rating">
                                        <option value="5">5 sterren</option>
                                        <option value="4">4 sterren</option>
                                        <option value="3">3 sterren</option>
                                        <option value="2">2 sterren</option>
                                        <option value="1">1 ster</option>
                                    </select>
                                </label>
                            </div>

                            <label>
                                Bericht
                                <textarea name="bericht" placeholder="Schrijf kort hoe je reis was"></textarea>
                            </label>

                            <button class="knop" type="submit">Recensie plaatsen</button>
                        </form>
                    <?php } else { ?>
                        <p class="text-bold">Je kunt een review plaatsen na een geboekte pakketreis.</p>
                    <?php } ?>
                </section>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
