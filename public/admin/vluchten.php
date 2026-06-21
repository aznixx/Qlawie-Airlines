<?php include __DIR__ . "/../../app/page-includes/laden/laad-admin.php"; ?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qlawie Airlines - Vluchten</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="button-styles.css">
</head>

<body>
    <div class="admin-pagina">
        <?php include __DIR__ . "/menu.php"; ?>

        <div class="dashboard">
            <div class="bovenkant">
                <h2>Vluchten</h2>
                <p>Admin paneel</p>
            </div>

            <div class="formulier-kaart" id="formulier">
                <h3><?= $vlucht_bewerken ? 'Vlucht wijzigen' : 'Vlucht toevoegen' ?></h3>

                <form action="../../app/page-includes/verwerken/verwerk-admin-vlucht.php" method="post">
                    <input type="hidden" name="actie" value="<?= $vlucht_bewerken ? 'wijzigen' : 'toevoegen' ?>">
                    <input type="hidden" name="id" value="<?= $vlucht_bewerken ? $vlucht_bewerken['id'] : '' ?>">

                    <div class="formulier-grid">
                        <label>
                            Vlucht nummer
                            <input type="text" name="vlucht_nummer" value="<?= $vlucht_bewerken ? $vlucht_bewerken['vlucht_nummer'] : '' ?>">
                        </label>

                        <label>
                            Vertrek luchthaven
                            <input type="text" name="vertrek_luchthaven" value="<?= $vlucht_bewerken ? $vlucht_bewerken['vertrek_luchthaven'] : '' ?>">
                        </label>

                        <label>
                            Aankomst luchthaven
                            <input type="text" name="aankomst_luchthaven" value="<?= $vlucht_bewerken ? $vlucht_bewerken['aankomst_luchthaven'] : '' ?>">
                        </label>

                        <label>
                            Vertrek datum
                            <input type="text" name="vertrek_datum" value="<?= $vlucht_bewerken ? $vlucht_bewerken['vertrek_datum'] : '' ?>">
                        </label>

                        <label>
                            Aankomst datum
                            <input type="text" name="aankomst_datum" value="<?= $vlucht_bewerken ? $vlucht_bewerken['aankomst_datum'] : '' ?>">
                        </label>

                        <label>
                            Prijs
                            <input type="number" step="0.01" name="prijs" value="<?= $vlucht_bewerken ? $vlucht_bewerken['prijs'] : '' ?>">
                        </label>

                        <label>
                            Stoelen
                            <input type="number" name="stoelen" value="<?= $vlucht_bewerken ? $vlucht_bewerken['stoelen'] : '' ?>">
                        </label>
                    </div>

                    <button class="btn-goud" type="submit"><?= $vlucht_bewerken ? 'Wijzigen' : 'Toevoegen' ?></button>
                    <?php if ($vlucht_bewerken) { ?>
                        <a class="btn-wit" href="vluchten.php">Annuleren</a>
                    <?php } ?>
                </form>
            </div>

            <div class="vluchten-kaart">
                <h3>Alle vluchten</h3>

                <div class="vlucht-info">
                    <div class="rij">Vlucht</div>
                    <div class="rij">Van</div>
                    <div class="rij">Naar</div>
                    <div class="rij">Vertrek</div>
                    <div class="rij">Prijs</div>
                    <div class="rij">Acties</div>
                </div>

                <?php foreach ($vluchten as $vlucht) { ?>
                    <div class="vlucht-rij">
                        <div class="rij"><?= $vlucht['vlucht_nummer'] ?></div>
                        <div class="rij"><?= $vlucht['vertrek_luchthaven'] ?></div>
                        <div class="rij"><?= $vlucht['aankomst_luchthaven'] ?></div>
                        <div class="rij"><?= $vlucht['vertrek_datum'] ?></div>
                        <div class="rij">&euro;<?= $vlucht['prijs'] ?></div>
                        <div class="rij acties-kolom">
                            <a class="btn-bewerken" href="vluchten.php?vlucht_id=<?= $vlucht['id'] ?>#formulier">Bewerken</a>

                            <form action="../../app/page-includes/verwerken/verwerk-admin-vlucht.php" method="post">
                                <input type="hidden" name="actie" value="verwijderen">
                                <input type="hidden" name="id" value="<?= $vlucht['id'] ?>">
                                <button class="verwijderen" type="submit">Verwijderen</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>
