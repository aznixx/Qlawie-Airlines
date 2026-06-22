<?php
include __DIR__ . "/../app/page-includes/laden/laad-homepage.php";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main>
    <section class="hero">
        <img src="assets/landingpage.jpg" alt="">
        <div class="overlay"></div>

        <div class="container hero-content">
            <h1 class="hero-title">Qlawie airlines</h1>
            <p class="hero-subtitle"><span class="accent-tekst">Reis stijlvol.</span> Boek makkelijk je volgende reis.</p>

            <div class="booking-box">
                <div class="booking-top">
                    <div>
                        <p class="eyebrow">Qlawie booking</p>
                        <h2>Boek je vlucht</h2>
                    </div>

                    <div class="button-row">
                        <button id="retourKnop" class="knop" type="button">Retour</button>
                        <button id="enkelKnop" class="knop-lijn" type="button">Enkel</button>
                    </div>
                </div>

                <form class="grid-4" action="resultaten.php" method="get">
                    <input id="reisType" type="hidden" name="reis_type" value="retour">

                    <label>
                        Van
                        <input type="text" name="van" placeholder="Vertrek vliegveld">
                    </label>

                    <label class="relative">
                        Naar
                        <input id="van" type="text" name="zoek" autocomplete="off" placeholder="Reis">
                        <div id="van-suggestions" class="suggestions hidden"></div>
                    </label>

                    <label>
                        Vertrek
                        <input type="date" name="vertrekdatum">
                    </label>

                    <label id="terugVeld">
                        Terug
                        <input type="date" name="terugkomstdatum">
                    </label>

                    <label>
                        Reizigers
                        <select name="reizigers">
                            <option>1 reiziger, Economy</option>
                            <option>2 reizigers, Economy</option>
                            <option>3 reizigers, Economy</option>
                            <option>4 reizigers, Economy</option>
                            <option>1 reiziger, Business</option>
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

                    <button class="knop" type="submit">Zoek vlucht</button>
                </form>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container grid-4">
            <div class="card">
                <p class="eyebrow">01</p>
                <h3>Snel zoeken</h3>
                <p>Vind reizen zonder gedoe en ga meteen door naar de details.</p>
            </div>
            <div class="card">
                <p class="eyebrow">02</p>
                <h3>Duidelijke prijzen</h3>
                <p>Bekijk direct wat een reis kost en hoeveel dagen je weg bent.</p>
            </div>
            <div class="card">
                <p class="eyebrow">03</p>
                <h3>Populaire plekken</h3>
                <p>Kies uit reizen die passen bij vakantie, stad en cultuur.</p>
            </div>
            <div class="card">
                <p class="eyebrow">04</p>
                <h3>Hulp bij vragen</h3>
                <p>Stuur ons makkelijk een bericht als je iets wilt weten.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <p class="eyebrow">Aanbiedingen</p>
            <h2>Populaire reizen</h2>

            <div class="grid-3">
                <?php foreach ($reizen as $reis) { ?>
                    <a class="travel-card" href="reis-info.php?id=<?= $reis['id'] ?>">
                        <img src="<?= $reis['afbeelding'] ?>" alt="<?= $reis['titel'] ?>">
                        <div class="card-body">
                            <p class="eyebrow"><?= $reis['duur_dagen'] ?> dagen</p>
                            <h3><?= $reis['titel'] ?></h3>
                            <p><?= $reis['korte_beschrijving'] ?></p>
                            <div class="card-actions">
                                <p class="text-bold accent-tekst">&euro;<?= $reis['prijs_vanaf'] ?></p>
                                <span class="knop">Bekijk reis</span>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php if (!empty($reizen)) {
        $laatste = count($reizen) - 1;
        $i = rand(0, $laatste);
        $uitgelicht = $reizen[$i];
    ?>
        <section class="section">
            <div class="container grid-2 card">
                <img src="<?= $uitgelicht['afbeelding'] ?>" alt="<?= $uitgelicht['titel'] ?>">
                <div>
                    <p class="eyebrow">Uitgelichte reis</p>
                    <h2><?= $uitgelicht['titel'] ?></h2>
                    <p><?= $uitgelicht['korte_beschrijving'] ?></p>
                    <div class="grid-3">
                        <div class="stat-card">
                            <p class="eyebrow">Duur</p>
                            <p class="text-bold"><?= $uitgelicht['duur_dagen'] ?> dagen</p>
                        </div>
                        <div class="stat-card">
                            <p class="eyebrow">Prijs</p>
                            <p class="text-bold">&euro;<?= $uitgelicht['prijs_vanaf'] ?></p>
                        </div>
                        <div class="stat-card">
                            <p class="eyebrow">Type</p>
                            <p class="text-bold">Pakketreis</p>
                        </div>
                    </div>
                    <div class="button-row">
                        <a class="knop" href="reis-info.php?id=<?= $uitgelicht['id'] ?>">Bekijk reis</a>
                        <a class="knop-lijn" href="boeken.php?reis_id=<?= $uitgelicht['id'] ?>">Boek nu</a>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <section class="section">
        <div class="container grid-3">
            <div class="card">
                <h3>Kies je reis</h3>
                <p>Zoek op plek en bekijk de informatie.</p>
            </div>
            <div class="card">
                <h3>Vul je gegevens in</h3>
                <p>Geef aan met hoeveel personen je gaat.</p>
            </div>
            <div class="card">
                <h3>Rond je aanvraag af</h3>
                <p>Daarna staat je boeking in het systeem.</p>
            </div>
        </div>
    </section>
</main>

<script>
    const reizen = <?php echo json_encode(array_column($reizen, 'titel')); ?>;
    const zoekInput = document.getElementById('van');
    const suggestions = document.getElementById('van-suggestions');

    if (zoekInput && suggestions) {
        zoekInput.addEventListener('input', function () {
            const zoekwoord = zoekInput.value.toLowerCase();
            suggestions.innerHTML = '';

            if (!zoekwoord) {
                suggestions.classList.add('hidden');
                return;
            }

            const matches = reizen.filter(function (reis) {
                return reis.toLowerCase().includes(zoekwoord);
            });

            matches.forEach(function (match) {
                const div = document.createElement('div');
                div.textContent = match;
                div.className = 'suggestie';
                div.addEventListener('click', function () {
                    zoekInput.value = match;
                    suggestions.classList.add('hidden');
                });
                suggestions.appendChild(div);
            });

            if (matches.length > 0) {
                suggestions.classList.remove('hidden');
            } else {
                suggestions.classList.add('hidden');
            }
        });
    }
</script>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
