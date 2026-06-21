<?php include __DIR__ . "/../../app/page-includes/laden/laad-admin.php"; ?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qlawie Airlines - Boekingen</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="button-styles.css">
</head>

<body>
    <div class="admin-pagina">
        <?php include __DIR__ . "/menu.php"; ?>

        <div class="dashboard">
            <div class="bovenkant">
                <h2>Boekingen</h2>
                <p>Admin paneel</p>
            </div>

            <div class="tabel-kaart">
                <div class="boekingen-info">
                    <div class="rij">Nummer</div>
                    <div class="rij">Klant</div>
                    <div class="rij">Reis of vlucht</div>
                    <div class="rij">Reizigers</div>
                    <div class="rij">Prijs</div>
                    <div class="rij">Status</div>
                    <div class="rij">Acties</div>
                </div>

                <?php foreach ($boekingen as $boeking) { ?>
                    <?php
                    $klant = $boeking['klant_naam'];

                    if ($boeking['voornaam']) {
                        $klant = $boeking['voornaam'] . " " . $boeking['achternaam'];
                    }

                    $reisOfVlucht = $boeking['titel'];

                    if ($boeking['vlucht_nummer']) {
                        $reisOfVlucht = $boeking['vlucht_nummer'] . " naar " . $boeking['aankomst_luchthaven'];
                    }
                    ?>

                    <div class="boekingen-rij">
                        <div class="rij"><?= $boeking['boekingsnummer'] ?></div>
                        <div class="rij"><?= $klant ?></div>
                        <div class="rij"><?= $reisOfVlucht ?></div>
                        <div class="rij"><?= $boeking['aantal_reizigers'] ?></div>
                        <div class="rij">&euro;<?= $boeking['totaalprijs'] ?></div>
                        <div class="rij"><?= $boeking['status'] ?></div>
                        <div class="rij acties-kolom">
                            <form action="../../app/page-includes/verwerken/verwerk-admin-boeking.php" method="post">
                                <input type="hidden" name="boeking_id" value="<?= $boeking['id'] ?>">
                                <select name="status">
                                    <option value="aangevraagd" <?= $boeking['status'] == 'aangevraagd' ? 'selected' : '' ?>>aangevraagd</option>
                                    <option value="bevestigd" <?= $boeking['status'] == 'bevestigd' ? 'selected' : '' ?>>bevestigd</option>
                                    <option value="geannuleerd" <?= $boeking['status'] == 'geannuleerd' ? 'selected' : '' ?>>geannuleerd</option>
                                </select>
                                <button class="btn-goud klein" type="submit">Opslaan</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>

                <?php if (!$boekingen) { ?>
                    <p>Geen boekingen gevonden.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>
