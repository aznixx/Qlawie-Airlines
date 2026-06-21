<?php
include __DIR__ . "/../app/page-includes/ophalen/haal-vluchtinformatie-op.php";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main>
    <?php if (!$vlucht) { ?>
        <section class="px-6 py-12">
            <div class="mx-auto max-w-4xl rounded-md border border-black bg-white p-5">
                <p class="text-xs font-bold uppercase text-accent">Niet gevonden</p>
                <h1 class="mt-2 font-fraunces text-4xl font-bold">Vlucht niet gevonden</h1>
                <p class="mt-3 text-black">Deze vlucht bestaat niet of is niet meer beschikbaar.</p>
                <a class="mt-5 inline-flex rounded-md bg-accent px-5 py-3 text-sm font-bold text-white hover:bg-black" href="vluchten.php">Terug naar vluchten</a>
            </div>
        </section>
    <?php } else { ?>
        <section class="relative overflow-hidden px-6 py-16 text-white">
            <img class="absolute inset-0 h-full w-full object-cover" src="assets/landingpage.jpg" alt="<?= $vlucht['aankomst_luchthaven'] ?>">
            <div class="absolute inset-0 bg-black/55"></div>

            <div class="relative mx-auto grid max-w-6xl gap-8 md:grid-cols-2 md:items-end">
                <div>
                    <a class="inline-flex rounded-md border border-white px-4 py-2 text-xs font-bold uppercase text-white hover:border-accent hover:text-accent" href="vluchten.php">Terug naar vluchten</a>
                    <p class="mt-8 text-xs font-bold uppercase text-accent">Qlawie vlucht</p>
                    <h1 class="mt-3 font-fraunces text-5xl font-bold">Vlucht naar <?= $vlucht['aankomst_luchthaven'] ?></h1>
                    <p class="mt-4 max-w-2xl text-white">Een losse vlucht met Qlawie Airlines. Geen hotel, geen pakket, gewoon je vlucht boeken.</p>
                </div>

                <div class="rounded-md bg-white p-5 text-black shadow-lg">
                    <p class="text-xs font-bold uppercase text-accent">Snel overzicht</p>
                    <div class="mt-4 grid gap-3">
                        <div class="rounded-md border border-black p-4">
                            <p class="text-xs font-bold uppercase text-accent">Vlucht nummer</p>
                            <p class="mt-2 font-fraunces text-2xl font-semibold"><?= $vlucht['vlucht_nummer'] ?></p>
                        </div>
                        <div class="rounded-md border border-black p-4">
                            <p class="text-xs font-bold uppercase text-accent">Prijs</p>
                            <p class="mt-2 font-fraunces text-2xl font-semibold">&euro;<?= $vlucht['prijs'] ?></p>
                        </div>
                        <div class="rounded-md border border-black p-4">
                            <p class="text-xs font-bold uppercase text-accent">Stoelen</p>
                            <p class="mt-2 font-fraunces text-2xl font-semibold"><?= $vlucht['stoelen'] ?> beschikbaar</p>
                        </div>
                    </div>
                    <a class="mt-5 inline-flex w-full justify-center rounded-md bg-accent px-5 py-3 text-sm font-bold text-white hover:bg-black" href="boeken.php?vlucht_id=<?= $vlucht['id'] ?>">Boek deze vlucht</a>
                </div>
            </div>
        </section>

        <section class="px-6 py-12">
            <div class="mx-auto grid max-w-6xl gap-5 md:grid-cols-2">
                <article class="rounded-md border border-black bg-white p-5">
                    <p class="text-xs font-bold uppercase text-accent">Vertrek</p>
                    <h2 class="mt-2 font-fraunces text-3xl font-bold"><?= $vlucht['vertrek_luchthaven'] ?></h2>
                    <p class="mt-3 text-black"><?= $vlucht['vertrek_datum'] ?></p>
                </article>

                <article class="rounded-md border border-black bg-white p-5">
                    <p class="text-xs font-bold uppercase text-accent">Aankomst</p>
                    <h2 class="mt-2 font-fraunces text-3xl font-bold"><?= $vlucht['aankomst_luchthaven'] ?></h2>
                    <p class="mt-3 text-black"><?= $vlucht['aankomst_datum'] ?></p>
                </article>
            </div>
        </section>

        <section class="bg-white px-6 py-12">
            <div class="mx-auto max-w-6xl">
                <p class="text-xs font-bold uppercase text-accent">Informatie</p>
                <h2 class="font-fraunces text-4xl font-bold">Wat zit erbij?</h2>
                <div class="mt-6 grid gap-5 md:grid-cols-3">
                    <div class="rounded-md border border-black p-5">
                        <h3 class="font-fraunces text-2xl font-semibold">Alleen vlucht</h3>
                        <p class="mt-2 text-sm text-black">Deze boeking is alleen voor de vlucht. Hotel en extra opties zitten hier niet bij.</p>
                    </div>
                    <div class="rounded-md border border-black p-5">
                        <h3 class="font-fraunces text-2xl font-semibold">Handbagage</h3>
                        <p class="mt-2 text-sm text-black">Je mag standaard handbagage meenemen tijdens je vlucht.</p>
                    </div>
                    <div class="rounded-md border border-black p-5">
                        <h3 class="font-fraunces text-2xl font-semibold">Qlawie Airlines</h3>
                        <p class="mt-2 text-sm text-black">Alle vluchten worden uitgevoerd door Qlawie Airlines.</p>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
