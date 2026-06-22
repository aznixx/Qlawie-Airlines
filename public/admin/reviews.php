<?php include __DIR__ . "/../../app/page-includes/laden/laad-admin.php"; ?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qlawie Airlines - Reviews</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="button-styles.css">
</head>

<body>
    <div class="admin-pagina">
        <?php include __DIR__ . "/menu.php"; ?>

        <div class="dashboard">
            <div class="bovenkant">
                <h2>Reviews</h2>
                <p>Admin paneel</p>
            </div>

            <div class="orders-kaart">
                <div class="orders-info">
                    <div class="rij">Reis</div>
                    <div class="rij">Naam</div>
                    <div class="rij">Rating</div>
                    <div class="rij">Bericht</div>
                    <div class="rij">Status</div>
                    <div class="rij">Acties</div>
                </div>

                <?php foreach ($recensies as $recensie) { ?>
                    <div class="orders-rij">
                        <div class="rij"><?= $recensie['titel'] ?></div>
                        <div class="rij"><?= $recensie['naam'] ?></div>
                        <div class="rij"><?= $recensie['rating'] ?></div>
                        <div class="rij"><?= $recensie['bericht'] ?></div>
                        <div class="rij"><?= $recensie['status'] ?></div>
                        <div class="rij acties-kolom">
                            <form action="../../app/page-includes/verwerken/verwerk-admin-recensie.php" method="post">
                                <input type="hidden" name="recensie_id" value="<?= $recensie['id'] ?>">
                                <input type="hidden" name="status" value="goedgekeurd">
                                <button class="btn-goud klein" type="submit">Goed</button>
                            </form>

                            <form action="../../app/page-includes/verwerken/verwerk-admin-recensie.php" method="post">
                                <input type="hidden" name="recensie_id" value="<?= $recensie['id'] ?>">
                                <input type="hidden" name="status" value="afgekeurd">
                                <button class="verwijderen klein" type="submit">Afkeur</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>

                <?php if (!$recensies) { ?>
                    <p>Geen reviews gevonden.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>
