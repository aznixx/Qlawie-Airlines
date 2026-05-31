<?php include __DIR__ . "/../app/page-includes/haal-bestemmingen-op.php"; ?>

<main>
    <section class="bg-white px-6 py-10">
        <div class="mx-auto max-w-6xl">
            <p class="text-xs font-bold uppercase text-accent">Bestemmingen</p>
            <h1 class="font-fraunces text-4xl font-bold">Populaire reizen</h1>
            <p class="mt-3 max-w-2xl text-black">Bekijk locaties en kies een reis die bij je past.</p>

            <form class="mt-6 grid gap-3 rounded-md bg-white p-4 md:grid-cols-4" action="resultaten.php" method="get">
                <input class="h-12 rounded-md border border-black px-3 text-sm outline-none focus:border-accent md:col-span-3" type="text" name="zoek" placeholder="Zoek op bestemming">
                <button class="h-12 rounded-md bg-accent px-5 text-sm font-bold text-white hover:bg-black" type="submit">Zoeken</button>
            </form>
        </div>
    </section>

    <section class="px-6 py-10">
        <div class="mx-auto max-w-6xl">
            <div class="mt-8 grid gap-5 md:grid-cols-3">
                <?php foreach ($bestemmingen as $bestemming): ?>
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
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
