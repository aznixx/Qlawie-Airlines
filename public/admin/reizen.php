<?php include __DIR__ . "/../../app/page-includes/laden/laad-admin.php"; ?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qlawie Airlines - Reizen</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="button-styles.css">
</head>

<body>
    <div class="admin-pagina">
        <?php include __DIR__ . "/menu.php"; ?>

        <div class="dashboard">
            <div class="bovenkant">
                <h2>Reizen</h2>
                <p>Admin paneel</p>
            </div>

            <div class="formulier-kaart" id="formulier">
                <h3><?= $reis_bewerken ? 'Reis wijzigen' : 'Reis toevoegen' ?></h3>

                <form action="../../app/page-includes/verwerken/verwerk-admin-reis.php" method="post">
                    <input type="hidden" name="actie" value="<?= $reis_bewerken ? 'wijzigen' : 'toevoegen' ?>">
                    <input type="hidden" name="id" value="<?= $reis_bewerken ? $reis_bewerken['id'] : '' ?>">

                    <div class="formulier-grid">
                        <label>
                            Titel
                            <input type="text" name="titel" value="<?= $reis_bewerken ? $reis_bewerken['titel'] : '' ?>">
                        </label>

                        <label>
                            Korte beschrijving
                            <input type="text" name="korte_beschrijving" value="<?= $reis_bewerken ? $reis_bewerken['korte_beschrijving'] : '' ?>">
                        </label>

                        <label>
                            Vertrek luchthaven
                            <input type="text" name="vertrek_luchthaven" value="<?= $reis_bewerken ? $reis_bewerken['vertrek_luchthaven'] : '' ?>">
                        </label>

                        <label>
                            Aankomst luchthaven
                            <input type="text" name="aankomst_luchthaven" value="<?= $reis_bewerken ? $reis_bewerken['aankomst_luchthaven'] : '' ?>">
                        </label>

                        <label>
                            Vertrekdatum
                            <input type="text" name="vertrekdatum" value="<?= $reis_bewerken ? $reis_bewerken['vertrekdatum'] : '' ?>">
                        </label>

                        <label>
                            Terugkomstdatum
                            <input type="text" name="terugkomstdatum" value="<?= $reis_bewerken ? $reis_bewerken['terugkomstdatum'] : '' ?>">
                        </label>

                        <label>
                            Duur dagen
                            <input type="number" name="duur_dagen" value="<?= $reis_bewerken ? $reis_bewerken['duur_dagen'] : '' ?>">
                        </label>

                        <label>
                            Reisklasse
                            <input type="text" name="reisklasse" value="<?= $reis_bewerken ? $reis_bewerken['reisklasse'] : '' ?>">
                        </label>

                        <label>
                            Prijs vanaf
                            <input type="number" step="0.01" name="prijs_vanaf" value="<?= $reis_bewerken ? $reis_bewerken['prijs_vanaf'] : '' ?>">
                        </label>

                        <label>
                            Beschikbare plekken
                            <input type="number" name="beschikbare_plekken" value="<?= $reis_bewerken ? $reis_bewerken['beschikbare_plekken'] : '' ?>">
                        </label>

                        <label>
                            Bagage inbegrepen
                            <input type="text" name="bagage_inbegrepen" value="<?= $reis_bewerken ? $reis_bewerken['bagage_inbegrepen'] : '' ?>">
                        </label>

                        <label>
                            Afbeelding
                            <input type="text" name="afbeelding" value="<?= $reis_bewerken ? $reis_bewerken['afbeelding'] : '' ?>">
                        </label>
                    </div>

                    <label>
                        Beschrijving
                        <textarea name="beschrijving"><?= $reis_bewerken ? $reis_bewerken['beschrijving'] : '' ?></textarea>
                    </label>

                    <button class="btn-goud" type="submit"><?= $reis_bewerken ? 'Wijzigen' : 'Toevoegen' ?></button>
                    <?php if ($reis_bewerken) { ?>
                        <a class="btn-wit" href="reizen.php">Annuleren</a>
                    <?php } ?>
                </form>
            </div>

            <div class="reizen-kaart">
                <div class="reizen-info">
                    <div class="rij">ID</div>
                    <div class="rij">Titel</div>
                    <div class="rij">Van</div>
                    <div class="rij">Naar</div>
                    <div class="rij">Prijs</div>
                    <div class="rij">Acties</div>
                </div>

                <?php foreach ($reizen as $reis) { ?>
                    <div class="reizen-rij">
                        <div class="rij"><?= $reis['id'] ?></div>
                        <div class="rij"><?= $reis['titel'] ?></div>
                        <div class="rij"><?= $reis['vertrek_luchthaven'] ?></div>
                        <div class="rij"><?= $reis['aankomst_luchthaven'] ?></div>
                        <div class="rij">&euro;<?= $reis['prijs_vanaf'] ?></div>
                        <div class="rij acties-kolom">
                            <a class="btn-bewerken" href="reizen.php?reis_id=<?= $reis['id'] ?>#formulier">Bewerken</a>

                            <form action="../../app/page-includes/verwerken/verwerk-admin-reis.php" method="post">
                                <input type="hidden" name="actie" value="verwijderen">
                                <input type="hidden" name="id" value="<?= $reis['id'] ?>">
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
