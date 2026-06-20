<?php
include __DIR__ . "/../app/page-includes/haal-reisinformatie-op.php";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main>
    <?php if ($notFound) { ?>
        <section class="px-6 py-12">
            <div class="mx-auto max-w-4xl rounded-md border border-black bg-white p-5">
                <p class="text-xs font-bold uppercase text-accent">Niet gevonden</p>
                <h1 class="mt-2 font-fraunces text-4xl font-bold">Reis niet gevonden</h1>
                <p class="mt-3 text-black">Deze reis bestaat niet of is niet meer beschikbaar.</p>
                <a class="mt-5 inline-flex rounded-md bg-accent px-5 py-3 text-sm font-bold text-white hover:bg-black" href="bestemmingen.php">Terug naar bestemmingen</a>
            </div>
        </section>
    <?php } else { ?>
        <section class="relative overflow-hidden px-6 py-16 text-white">
            <img class="absolute inset-0 h-full w-full object-cover" src="<?= $bestemming['afbeelding'] ?>" alt="<?= $bestemming['naam'] ?>">
            <div class="absolute inset-0 bg-black/55"></div>

            <div class="relative mx-auto grid max-w-6xl gap-8 md:grid-cols-2 md:items-end">
                <div>
                    <a class="inline-flex rounded-md border border-white px-4 py-2 text-xs font-bold uppercase text-white hover:border-accent hover:text-accent" href="bestemmingen.php">Terug naar bestemmingen</a>
                    <p class="mt-8 text-xs font-bold uppercase text-accent">Reisoverzicht</p>
                    <h1 class="mt-3 font-fraunces text-5xl font-bold"><?= $bestemming['naam'] ?></h1>
                    <p class="mt-4 max-w-2xl text-white"><?= $bestemming['beschrijving'] ?></p>
                </div>

                <div class="rounded-md bg-white p-5 text-black shadow-lg">
                    <p class="text-xs font-bold uppercase text-accent">Snel overzicht</p>
                    <div class="mt-4 grid gap-3">
                        <div class="rounded-md border border-black p-4">
                            <p class="text-xs font-bold uppercase text-accent">Reisduur</p>
                            <p class="mt-2 font-fraunces text-2xl font-semibold"><?= $bestemming['aantal_dagen'] ?> dagen</p>
                        </div>
                        <div class="rounded-md border border-black p-4">
                            <p class="text-xs font-bold uppercase text-accent">Prijs</p>
                            <p class="mt-2 font-fraunces text-2xl font-semibold">&euro;<?= $bestemming['prijs_reis'] ?></p>
                        </div>
                        <div class="rounded-md border border-black p-4">
                            <p class="text-xs font-bold uppercase text-accent">Type</p>
                            <p class="mt-2 font-fraunces text-2xl font-semibold">Pakketreis</p>
                        </div>
                    </div>

                    <?php if ($reis) { ?>
                        <a class="mt-5 inline-flex w-full justify-center rounded-md bg-accent px-5 py-3 text-sm font-bold text-white hover:bg-black" href="boeken.php?reis_id=<?= $reis['id'] ?>">Boek deze reis</a>
                    <?php } else { ?>
                        <a class="mt-5 inline-flex w-full justify-center rounded-md bg-accent px-5 py-3 text-sm font-bold text-white hover:bg-black" href="boeken.php">Boek een reis</a>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section class="px-6 py-12">
            <div class="mx-auto grid max-w-6xl gap-5 md:grid-cols-3">
                <article class="rounded-md border border-black bg-white p-5">
                    <p class="text-xs font-bold uppercase text-accent">Stad</p>
                    <h2 class="mt-2 font-fraunces text-3xl font-bold"><?= $bestemming['stad'] ?></h2>
                    <p class="mt-3 text-black"><?= $bestemming['land'] ?></p>
                </article>

                <article class="rounded-md border border-black bg-white p-5">
                    <p class="text-xs font-bold uppercase text-accent">Klimaat</p>
                    <h2 class="mt-2 font-fraunces text-3xl font-bold"><?= $bestemming['klimaat'] ?></h2>
                    <p class="mt-3 text-black">Bekijk de bestemming en kies daarna je boeking.</p>
                </article>

                <article class="rounded-md border border-black bg-white p-5">
                    <p class="text-xs font-bold uppercase text-accent">Hoogtepunten</p>
                    <h2 class="mt-2 font-fraunces text-3xl font-bold"><?= $bestemming['highlights'] ?></h2>
                    <p class="mt-3 text-black">Meer informatie staat bij de reis.</p>
                </article>
            </div>
        </section>

        <?php if ($reis) { ?>
            <section class="bg-white px-6 py-12">
                <div class="mx-auto max-w-6xl">
                    <p class="text-xs font-bold uppercase text-accent">Reis</p>
                    <h2 class="font-fraunces text-4xl font-bold"><?= $reis['titel'] ?></h2>
                    <p class="mt-4 text-black"><?= $reis['beschrijving'] ?></p>

                    <div class="mt-6 grid gap-5 md:grid-cols-3">
                        <div class="rounded-md border border-black p-5">
                            <h3 class="font-fraunces text-2xl font-semibold">Vertrek</h3>
                            <p class="mt-2 text-sm text-black"><?= $reis['vertrek_luchthaven'] ?> naar <?= $reis['aankomst_luchthaven'] ?></p>
                            <p class="mt-2 text-sm text-black"><?= $reis['vertrekdatum'] ?></p>
                        </div>
                        <div class="rounded-md border border-black p-5">
                            <h3 class="font-fraunces text-2xl font-semibold">Terug</h3>
                            <p class="mt-2 text-sm text-black"><?= $reis['terugkomstdatum'] ?></p>
                            <p class="mt-2 text-sm text-black"><?= $reis['duur_dagen'] ?> dagen</p>
                        </div>
                        <div class="rounded-md border border-black p-5">
                            <h3 class="font-fraunces text-2xl font-semibold">Inbegrepen</h3>
                            <p class="mt-2 text-sm text-black"><?= $reis['bagage_inbegrepen'] ?></p>
                            <p class="mt-2 text-sm text-black"><?= $reis['accommodatie'] ?></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="px-6 py-12">
                <div class="mx-auto max-w-6xl">
                    <p class="text-xs font-bold uppercase text-accent">Reviews</p>
                    <h2 class="font-fraunces text-4xl font-bold">Wat klanten zeggen</h2>

                    <div class="mt-6 grid gap-5 md:grid-cols-3">
                        <?php if (empty($recensies)) { ?>
                            <div class="rounded-md border border-black bg-white p-5">
                                <p class="font-bold">Nog geen reviews.</p>
                            </div>
                        <?php } ?>

                        <?php foreach ($recensies as $recensie) { ?>
                            <article class="rounded-md border border-black bg-white p-5">
                                <p class="text-sm font-bold text-accent"><?= $recensie['rating'] ?> sterren</p>
                                <h3 class="mt-2 font-fraunces text-2xl font-semibold"><?= $recensie['naam'] ?></h3>
                                <p class="mt-3 text-sm text-black"><?= $recensie['bericht'] ?></p>
                            </article>
                        <?php } ?>
                    </div>
                </div>
            </section>
        <?php } ?>
    <?php } ?>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
