<?php
include __DIR__ . "/../app/page-includes/haal-vluchten-op.php";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main>
    <section class="bg-white px-6 py-10">
        <div class="mx-auto max-w-6xl">
            <p class="text-xs font-bold uppercase text-accent">Vluchten</p>
            <h1 class="font-fraunces text-4xl font-bold">Losse vluchten</h1>
            <p class="mt-3 max-w-2xl text-black">Boek alleen een vlucht naar je bestemming, zonder hotel of extra pakket.</p>
        </div>
    </section>

    <section class="px-6 py-10">
        <div class="mx-auto max-w-6xl">
            <?php if (empty($vluchten)) { ?>
                <div class="rounded-md border border-black bg-white p-5">
                    <p class="font-bold">Er zijn nog geen vluchten beschikbaar.</p>
                    <p class="mt-2 text-sm text-black">Kom later terug of bekijk onze reizen.</p>
                    <a class="mt-4 inline-flex rounded-md bg-accent px-4 py-2 text-sm font-bold text-white hover:bg-black" href="bestemmingen.php">Bekijk reizen</a>
                </div>
            <?php } else { ?>
                <div class="grid gap-5 md:grid-cols-3">
                    <?php foreach ($vluchten as $vlucht) { ?>
                        <a
                            class="group block overflow-hidden rounded-md border border-black bg-white transition hover:-translate-y-1 hover:border-accent hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-accent focus:ring-offset-2"
                            href="vlucht-info.php?id=<?= htmlspecialchars($vlucht['id']) ?>"
                            aria-label="Bekijk vlucht naar <?= htmlspecialchars($vlucht['stad'] ?? $vlucht['naam']) ?>">
                            <img class="h-40 w-full object-cover transition duration-300 group-hover:scale-105" src="<?= htmlspecialchars($vlucht['afbeelding'] ?? 'assets/landingpage.jpg') ?>" alt="<?= htmlspecialchars($vlucht['stad'] ?? $vlucht['naam']) ?>">
                            <div class="p-5">
                                <p class="text-sm font-bold text-accent"><?= htmlspecialchars($vlucht['vlucht_nummer']) ?></p>
                                <h2 class="font-fraunces text-2xl font-semibold"><?= htmlspecialchars($vlucht['stad'] ?? $vlucht['naam']) ?></h2>
                                <p class="mt-2 text-sm text-black"><?= htmlspecialchars($vlucht['vertrek_luchthaven']) ?> naar <?= htmlspecialchars($vlucht['aankomst_luchthaven']) ?></p>
                                <p class="mt-2 text-sm text-black"><?= date("d-m-Y H:i", strtotime($vlucht['vertrek_datum'])) ?></p>
                                <div class="mt-4 flex items-center justify-between gap-3">
                                    <p class="font-bold text-accent">&euro;<?= htmlspecialchars($vlucht['prijs']) ?></p>
                                    <span class="inline-flex rounded-md bg-accent px-4 py-2 text-sm font-bold text-white transition group-hover:bg-black">Bekijk vlucht</span>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
