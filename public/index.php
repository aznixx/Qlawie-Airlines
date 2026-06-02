<?php include __DIR__ . "/../app/page-includes/laad-homepage.php"; ?>

<main>
    <!-- Landing section en nee dit is niet met ai niek -->
    <section class="relative flex min-h-[650px] flex-col items-center justify-center gap-6 overflow-hidden px-6 py-10">
        <img class="absolute inset-0 h-full w-full object-cover object-center" src="assets/landingpage.jpg" alt="">
        <div class="absolute inset-0 bg-black/35"></div>
        <div class="relative mx-auto mb-10 mt-20 max-w-5xl px-6 text-center text-white">
            <h1 class="font-fraunces text-5xl font-bold text-shadow-lg sm:text-6xl md:text-7xl">
                Qlawie airlines
            </h1>

            <div class="mx-auto mt-5 grid max-w-3xl gap-2 text-white drop-shadow-md">
                <span class="font-fraunces text-3xl font-semibold text-accent sm:text-4xl">Reis stijlvol.</span>
                <span class="font-sans font-semibold uppercase sm:text-lg">Boek makkelijk je volgende reis.</span>
            </div>
        </div>
        <!-- Booking ding -->
        <div class="z-10 mt-10 w-full max-w-5xl rounded-lg bg-white p-5 font-sans text-black shadow-lg">
            <div class="mb-4 flex flex-col gap-3 border-b border-black pb-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-xs font-bold uppercase text-accent">Qlawie booking</p>
                    <h2 class="font-fraunces text-2xl font-semibold">Boek je vlucht</h2>
                </div>

                <div class="flex flex-wrap gap-2 text-sm font-bold">
                    <button class="rounded-md bg-accent px-4 py-2 text-white" type="button">Retour</button>
                    <button class="rounded-md border border-black px-4 py-2 text-black hover:border-accent hover:text-accent" type="button">Enkel</button>
                </div>
            </div>

            <form class="grid gap-3 md:grid-cols-2 lg:grid-cols-4" action="resultaten.php" method="get">
                <label class="grid gap-1">
                    <span class="text-xs font-bold uppercase text-black">Van</span>
                    <input class="h-12 rounded-md border border-black px-3 text-sm font-semibold outline-none focus:border-accent" type="text" placeholder="Vertrek vliegveld" aria-label="Vertrekplaats">
                </label>

                <label class="grid gap-1">
                    <span class="text-xs font-bold uppercase text-black">Naar</span>
                    <input id="van" class="h-12 rounded-md border border-black px-3 text-sm font-semibold outline-none focus:border-accent" type="text" name="zoek" autocomplete="off" placeholder="Bestemming" aria-label="Bestemming">
                    <div id="van-suggestions" class="absolute left-0 z-10 hidden max-h-48 w-full overflow-y-auto rounded-md border border-black bg-white shadow-md"></div>
                </label>

                <label class="grid gap-1">
                    <span class="text-xs font-bold uppercase text-black">Vertrek</span>
                    <input class="h-12 rounded-md border border-black px-3 text-sm font-semibold outline-none focus:border-accent" type="date" aria-label="Vertrekdatum">
                </label>

                <label class="grid gap-1">
                    <span class="text-xs font-bold uppercase text-black">Terug</span>
                    <input class="h-12 rounded-md border border-black px-3 text-sm font-semibold outline-none focus:border-accent" type="date" aria-label="Terugdatum">
                </label>

                <label class="grid gap-1 md:col-span-1 lg:col-span-2">
                    <span class="text-xs font-bold uppercase text-black">Reizigers</span>
                    <select class="h-12 rounded-md border border-black px-3 text-sm font-semibold outline-none focus:border-accent" aria-label="Aantal reizigers">
                        <option>1 reiziger, Economy</option>
                        <option>2 reizigers, Economy</option>
                        <option>3 reizigers, Economy</option>
                        <option>4 reizigers, Economy</option>
                        <option>1 reiziger, Business</option>
                    </select>
                </label>

                <label class="grid gap-1">
                    <span class="text-xs font-bold uppercase text-black">Bagage</span>
                    <select class="h-12 rounded-md border border-black px-3 text-sm font-semibold outline-none focus:border-accent" aria-label="Bagage">
                        <option>Handbagage</option>
                        <option>Ruimbagage</option>
                        <option>Extra bagage</option>
                    </select>
                </label>

                <button class="mt-5 h-12 rounded-md bg-accent px-6 text-sm font-bold text-white hover:bg-black md:col-span-2 lg:col-span-1 lg:mt-6" type="submit">
                    Zoek vlucht
                </button>
            </form>
        </div>
    </section>
    <!-- populaire reizen -->
    <section class="px-6 py-12">
        <div class="mx-auto max-w-6xl">
            <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="text-xs font-bold uppercase text-accent">Aanbiedingen</p>
                    <h2 class="font-fraunces text-4xl font-bold">Populaire reizen</h2>
                </div>
                <a class="text-sm font-bold text-accent" href="bestemmingen.php">Alle bestemmingen bekijken</a>
            </div>
            <div class="mt-6 grid gap-5 md:grid-cols-3">
                <?php foreach ($bestemmingen as $bestemming) { ?>
                    <a
                        class="group block overflow-hidden rounded-md border border-black bg-white transition hover:-translate-y-1 hover:border-accent hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-accent focus:ring-offset-2"
                        href="reis-info.php?slug=<?= rawurlencode($bestemming['slug']) ?>"
                        aria-label="Bekijk reisinformatie voor <?= htmlspecialchars($bestemming['naam']) ?>">
                        <img class="h-40 w-full object-cover transition duration-300 group-hover:scale-105" src="<?= htmlspecialchars($bestemming['afbeelding']) ?>" alt="<?= htmlspecialchars($bestemming['naam']) ?>">
                        <div class="p-5">
                            <p class="text-sm font-bold text-accent"><?= htmlspecialchars($bestemming['aantal_dagen']) ?> dagen</p>
                            <h2 class="font-fraunces text-2xl font-semibold"><?= htmlspecialchars($bestemming["naam"]) ?></h2>
                            <p class="mt-2 text-sm text-black"><?= htmlspecialchars($bestemming['korte_beschrijving']) ?></p>
                            <div class="mt-4 flex items-center justify-between gap-3">
                                <p class="font-bold text-accent">&euro;<?= htmlspecialchars($bestemming['prijs_reis']) ?></p>
                                <span class="inline-flex rounded-md bg-accent px-4 py-2 text-sm font-bold text-white transition group-hover:bg-black">Bekijk reis</span>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- info section -->
    <section class="bg-white px-6 py-12">
        <div class="mx-auto grid max-w-6xl gap-5 md:grid-cols-4">
            <div class="md:col-span-1">
                <h2 class="font-fraunces text-3xl font-bold">Waarom Qlawie?</h2>
                <p class="mt-3 text-sm text-black">Duidelijke reizen, simpele boekingen en hulp als je vragen hebt.</p>
            </div>
            <div class="rounded-md bg-white p-5">
                <h3 class="font-fraunces text-xl font-semibold">Bestemmingen</h3>
                <p class="mt-2 text-sm text-black">Lees informatie over locaties voordat je boekt.</p>
                <a class="mt-3 inline-block text-sm font-bold text-accent" href="bestemmingen.php">Bekijk bestemmingen</a>
            </div>
            <div class="rounded-md bg-white p-5">
                <h3 class="font-fraunces text-xl font-semibold">Boeken</h3>
                <p class="mt-2 text-sm text-black">Kies een bestemming en rond je boeking makkelijk af.</p>
                <a class="mt-3 inline-block text-sm font-bold text-accent" href="bestemmingen.php">Boek een reis</a>
            </div>
            <div class="rounded-md bg-white p-5">
                <h3 class="font-fraunces text-xl font-semibold">Contact</h3>
                <p class="mt-2 text-sm text-black">Stuur makkelijk een bericht naar de reisorganisatie.</p>
                <a class="mt-3 inline-block text-sm font-bold text-accent" href="contact.php">Neem contact op</a>
            </div>
        </div>
    </section>

</main>
<script>
    const bestemmingen = <?php echo json_encode(array_column($bestemmingen, 'naam')); ?>;

    const dinosaur = document.getElementById('van');
    const suggestions = document.getElementById('van-suggestions');

    dinosaur.addEventListener('input', () => {
        const niekisvanmij = dinosaur.value.toLowerCase();
        suggestions.innerHTML = '';

        if (!niekisvanmij) {
            suggestions.classList.add('hidden');
            return;
        }

        const matches = bestemmingen.filter(b => b.toLowerCase().includes(niekisvanmij));

        if (matches.length === 0) {
            suggestions.classList.add('hidden');
            return;
        }

        matches.forEach(match => {
            const div = document.createElement('div');
            div.textContent = match;
            div.classList = 'cursor-pointer px-4 py-2 text-sm hover:bg-black hover:text-white';
            div.addEventListener('click', () => {
                dinosaur.value = match;
                suggestions.classList.add('hidden');
            });
            suggestions.appendChild(div);
        });

        suggestions.classList.remove('hidden');
    });
</script>
<?php include __DIR__ . "/../app/includes/footer.php"; ?>
