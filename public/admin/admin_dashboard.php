<?php include __DIR__ . "/../../app/page-includes/laden/laad-admin.php"; ?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qlawie Airlines - Admin</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="admin-pagina">
        <?php include __DIR__ . "/menu.php"; ?>

        <div class="dashboard">
            <div class="bovenkant">
                <h2>Dashboard</h2>
                <p>Admin paneel</p>
            </div>

            <div class="status">
                <div class="kaart">
                    <p>Vluchten</p>
                    <h3><?= $aantalVluchten['totaal'] ?></h3>
                </div>

                <div class="kaart">
                    <p>Boekingen</p>
                    <h3><?= $aantalBoekingen['totaal'] ?></h3>
                </div>

                <div class="kaart">
                    <p>Passagiers</p>
                    <h3><?= $aantalPassagiers['totaal'] ?></h3>
                </div>

                <div class="kaart">
                    <p>Omzet</p>
                    <h3>&euro;<?= $omzet['totaal'] ?></h3>
                </div>
            </div>

            <div class="vluchten-kaart">
                <h3>Komende vluchten</h3>

                <div class="vlucht-info">
                    <div class="rij">Vlucht</div>
                    <div class="rij">Van</div>
                    <div class="rij">Naar</div>
                    <div class="rij">Vertrek</div>
                    <div class="rij">Aankomst</div>
                    <div class="rij">Stoelen</div>
                </div>

                <?php foreach ($vluchten as $vlucht) { ?>
                    <div class="vlucht-rij">
                        <div class="rij"><?= $vlucht['vlucht_nummer'] ?></div>
                        <div class="rij"><?= $vlucht['vertrek_luchthaven'] ?></div>
                        <div class="rij"><?= $vlucht['aankomst_luchthaven'] ?></div>
                        <div class="rij"><?= $vlucht['vertrek_datum'] ?></div>
                        <div class="rij"><?= $vlucht['aankomst_datum'] ?></div>
                        <div class="rij status-op-tijd"><?= $vlucht['stoelen'] ?></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>
