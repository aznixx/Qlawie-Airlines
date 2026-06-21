<?php include __DIR__ . "/../../app/page-includes/laden/laad-admin.php"; ?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qlawie Airlines - Berichten</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="button-styles.css">
</head>

<body>
    <div class="admin-pagina">
        <?php include __DIR__ . "/menu.php"; ?>

        <div class="dashboard">
            <div class="bovenkant">
                <h2>Berichten</h2>
                <p>Admin paneel</p>
            </div>

            <div class="tabel-kaart">
                <div class="berichten-info">
                    <div class="rij">Naam</div>
                    <div class="rij">Email</div>
                    <div class="rij">Onderwerp</div>
                    <div class="rij">Bericht</div>
                    <div class="rij">Status</div>
                    <div class="rij">Acties</div>
                </div>

                <?php foreach ($contactBerichten as $bericht) { ?>
                    <div class="berichten-rij">
                        <div class="rij"><?= $bericht['naam'] ?></div>
                        <div class="rij"><?= $bericht['email'] ?></div>
                        <div class="rij"><?= $bericht['onderwerp'] ?></div>
                        <div class="rij"><?= $bericht['bericht'] ?></div>
                        <div class="rij"><?= $bericht['status'] ?></div>
                        <div class="rij acties-kolom">
                            <form action="../../app/page-includes/verwerken/verwerk-admin-contact.php" method="post">
                                <input type="hidden" name="bericht_id" value="<?= $bericht['id'] ?>">
                                <input type="hidden" name="status" value="gelezen">
                                <button class="btn-goud klein" type="submit">Gelezen</button>
                            </form>

                            <form action="../../app/page-includes/verwerken/verwerk-admin-contact.php" method="post">
                                <input type="hidden" name="bericht_id" value="<?= $bericht['id'] ?>">
                                <input type="hidden" name="status" value="beantwoord">
                                <button class="btn-wit klein" type="submit">Beantwoord</button>
                            </form>

                            <form action="../../app/page-includes/verwerken/verwerk-admin-contact.php" method="post">
                                <input type="hidden" name="bericht_id" value="<?= $bericht['id'] ?>">
                                <input type="hidden" name="status" value="verwijderen">
                                <button class="verwijderen klein" type="submit">Verwijder</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>

                <?php if (!$contactBerichten) { ?>
                    <p>Geen berichten gevonden.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>
