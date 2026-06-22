<?php
include __DIR__ . "/../app/page-includes/laden/laad-boekformulier.php";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main>
    <section class="section">
        <div class="container">
            <p class="eyebrow">Boeken</p>
            <h1>Boeking maken</h1>
            <p>Kies een reis of losse vlucht en vul je gegevens in.</p>

            <?php if ($foutmelding !== '') { ?>
                <p class="melding"><?= $foutmelding ?></p>
            <?php } ?>

            <form id="boekForm" class="form form-grid" action="../app/page-includes/verwerken/verwerk-boeking.php" method="post">
                <label>
                    Pakketreis
                    <select name="reis_id">
                        <option value="">Geen pakketreis</option>
                        <?php foreach ($reizen as $reis) { ?>
                            <option value="<?= $reis['id'] ?>" <?= $reis_id == $reis['id'] ? 'selected' : '' ?>><?= $reis['titel'] ?></option>
                        <?php } ?>
                    </select>
                </label>

                <label>
                    Losse vlucht
                    <select name="vlucht_id">
                        <option value="">Geen losse vlucht</option>
                        <?php foreach ($vluchten as $vlucht) { ?>
                            <option value="<?= $vlucht['id'] ?>" <?= $vlucht_id == $vlucht['id'] ? 'selected' : '' ?>><?= $vlucht['vlucht_nummer'] ?> - <?= $vlucht['aankomst_luchthaven'] ?></option>
                        <?php } ?>
                    </select>
                </label>

                <label>
                    Naam
                    <input type="text" name="naam" value="<?= $gebruiker ? $gebruiker['voornaam'] : '' ?>" required>
                </label>

                <label>
                    E-mail
                    <input type="email" value="<?= $gebruiker ? $gebruiker['email'] : '' ?>" name="email" required>
                </label>

                <label>
                    Telefoon
                    <input type="text" value="<?= $gebruiker ? $gebruiker['telefoon'] : '' ?>" name="telefoon">
                </label>

                <label>
                    Aantal reizigers
                    <select name="reizigers">
                        <option value="1">1 reiziger</option>
                        <option value="2">2 reizigers</option>
                        <option value="3">3 reizigers</option>
                        <option value="4">4 reizigers</option>
                    </select>
                </label>

                <label>
                    Reisklasse
                    <select name="reisklasse">
                        <option>Economy</option>
                        <option>Premium Economy</option>
                        <option>Business</option>
                    </select>
                </label>

                <label>
                    Bagage
                    <select name="bagage">
                        <option>Handbagage</option>
                        <option>Ruimbagage</option>
                        <option>Extra bagage</option>
                    </select>
                </label>

                <label class="veld-groot">
                    Opmerkingen
                    <textarea name="opmerkingen"></textarea>
                </label>

                <button class="knop veld-groot" type="submit">Boeking afronden</button>
            </form>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
