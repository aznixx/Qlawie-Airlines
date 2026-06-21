<?php
include __DIR__ . "/../app/page-includes/laden/laad-account.php";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main class="min-h-screen bg-[#f6f4ef] text-black">
    <section class="border-b border-black bg-white px-6 py-8">
        <div class="mx-auto grid max-w-7xl gap-6 lg:grid-cols-[minmax(0,1fr)_340px] lg:items-end">
            <div>
                <p class="text-xs font-bold uppercase text-accent">Mijn Qlawie</p>
                <h1 class="mt-2 font-fraunces text-4xl font-bold sm:text-5xl">Account dashboard</h1>
                <p class="mt-3 max-w-2xl text-sm leading-6 text-black">
                    Bekijk je gegevens en boekingen.
                </p>
            </div>

            <div class="rounded-md border border-black bg-black p-5 text-white">
                <p class="text-xs font-bold uppercase text-accent">Volgende boeking</p>
                <?php if ($volgendeBoeking) { ?>
                    <?php
                    $titel = $volgendeBoeking['titel'];
                    $datum = $volgendeBoeking['vertrekdatum'];

                    if ($volgendeBoeking['vlucht_id']) {
                        $titel = "Vlucht naar " . $volgendeBoeking['aankomst_luchthaven'];
                        $datum = $volgendeBoeking['vertrek_datum'];
                    }
                    ?>
                    <h2 class="mt-2 font-fraunces text-2xl font-bold"><?= $titel ?></h2>
                    <div class="mt-4 grid grid-cols-2 gap-3 text-sm">
                        <div>
                            <p class="text-xs font-bold uppercase text-accent">Datum</p>
                            <p class="mt-1 font-bold"><?= $datum ?></p>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase text-accent">Status</p>
                            <p class="mt-1 font-bold"><?= $volgendeBoeking['status'] ?></p>
                        </div>
                    </div>
                <?php } else { ?>
                    <h2 class="mt-2 font-fraunces text-2xl font-bold">Geen boeking</h2>
                    <p class="mt-3 text-sm">Je hebt nog geen actieve boeking.</p>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="mx-auto grid max-w-7xl gap-6 px-6 py-8 lg:grid-cols-[280px_minmax(0,1fr)]">
        <aside class="h-fit rounded-md border border-black bg-white p-5 lg:sticky lg:top-24">
            <div class="flex items-center gap-4">
                <div class="flex h-14 w-14 items-center justify-center rounded-md bg-accent font-fraunces text-2xl font-bold text-white">QA</div>
                <div>
                    <p class="font-bold"><?= $gebruiker['voornaam'] ?> <?= $gebruiker['achternaam'] ?></p>
                    <p class="text-sm"><?= $gebruiker['email'] ?></p>
                </div>
            </div>

            <dl class="mt-6 grid gap-3 text-sm">
                <div class="border-t border-black pt-3">
                    <dt class="text-xs font-bold uppercase text-accent">Telefoon</dt>
                    <dd class="mt-1 font-semibold"><?= $gebruiker['telefoon'] ?></dd>
                </div>
                <div class="border-t border-black pt-3">
                    <dt class="text-xs font-bold uppercase text-accent">Rol</dt>
                    <dd class="mt-1 font-semibold"><?= $gebruiker['rol'] ?></dd>
                </div>
                <div class="border-t border-black pt-3">
                    <dt class="text-xs font-bold uppercase text-accent">Boekingen</dt>
                    <dd class="mt-1 font-semibold"><?= count($boekingen) ?></dd>
                </div>
            </dl>

            <div class="mt-6 grid gap-2">
                <a class="inline-flex h-11 items-center justify-center rounded-md border border-black px-4 text-sm font-bold hover:border-accent hover:text-accent" href="uitloggen.php">Uitloggen</a>
            </div>
        </aside>

        <div class="min-w-0 space-y-6">
            <section class="grid gap-3 sm:grid-cols-3">
                <article class="rounded-md border border-black bg-white p-4">
                    <p class="text-xs font-bold uppercase text-accent">Bevestigd</p>
                    <p class="mt-2 font-fraunces text-4xl font-bold"><?= $bevestigdeBoekingen['totaal'] ?></p>
                </article>
                <article class="rounded-md border border-black bg-white p-4">
                    <p class="text-xs font-bold uppercase text-accent">Geannuleerd</p>
                    <p class="mt-2 font-fraunces text-4xl font-bold"><?= $geannuleerdeBoekingen['totaal'] ?></p>
                </article>
                <article class="rounded-md border border-black bg-white p-4">
                    <p class="text-xs font-bold uppercase text-accent">Reviews</p>
                    <p class="mt-2 font-fraunces text-4xl font-bold"><?= $reviewAantal['totaal'] ?></p>
                </article>
            </section>

            <section class="rounded-md border border-black bg-white">
                <div class="flex flex-col gap-3 border-b border-black p-5 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase text-accent">Boekingen</p>
                        <h2 class="font-fraunces text-2xl font-bold">Mijn boekingen</h2>
                    </div>
                    <div class="flex flex-col gap-2 sm:flex-row">
                        <a class="inline-flex h-10 items-center justify-center rounded-md bg-black px-4 text-sm font-bold text-white hover:bg-accent" href="reizen.php">Nieuwe reis</a>
                        <a class="inline-flex h-10 items-center justify-center rounded-md bg-accent px-4 text-sm font-bold text-white hover:bg-black" href="vluchten.php">Nieuwe vlucht</a>
                    </div>
                </div>

                <div class="divide-y divide-black">
                    <?php if (empty($boekingen)) { ?>
                        <div class="p-5">
                            <p class="font-bold">Je hebt nog geen boekingen.</p>
                        </div>
                    <?php } ?>

                    <?php foreach ($boekingen as $boeking) { ?>
                        <?php
                        $titel = $boeking['titel'];
                        $datum = $boeking['vertrekdatum'];
                        $soort = "Pakketreis";

                        if ($boeking['vlucht_id']) {
                            $titel = "Vlucht naar " . $boeking['aankomst_luchthaven'];
                            $datum = $boeking['vertrek_datum'];
                            $soort = "Losse vlucht";
                        }
                        ?>
                        <article class="grid gap-4 p-5 xl:grid-cols-[1fr_160px_130px_160px] xl:items-center">
                            <div>
                                <p class="font-fraunces text-2xl font-bold"><?= $titel ?></p>
                                <p class="mt-1 text-sm"><?= $boeking['aantal_reizigers'] ?> reiziger(s) - <?= $soort ?></p>
                                <p class="mt-1 text-xs">Boeking: <?= $boeking['boekingsnummer'] ?></p>
                            </div>
                            <p class="text-sm font-bold"><?= $datum ?></p>
                            <p class="text-sm font-bold text-accent"><?= $boeking['status'] ?></p>
                            <div>
                                <?php if ($boeking['status'] !== 'geannuleerd') { ?>
                                    <form action="../app/page-includes/verwerken/verwerk-annuleren-boeking.php" method="post">
                                        <input type="hidden" name="boeking_id" value="<?= $boeking['id'] ?>">
                                        <button class="h-10 w-full rounded-md bg-black px-3 text-xs font-bold text-white hover:bg-accent" type="submit">Annuleren</button>
                                    </form>
                                <?php } else { ?>
                                    <p class="text-sm font-bold">Geannuleerd</p>
                                <?php } ?>
                            </div>
                        </article>
                    <?php } ?>
                </div>
            </section>

            <section class="rounded-md border border-black bg-white p-5">
                <p class="text-xs font-bold uppercase text-accent">Review</p>
                <h2 class="font-fraunces text-2xl font-bold">Plaats een recensie</h2>

                <?php
                $heeftReisBoeking = false;

                foreach ($boekingen as $boeking) {
                    if (!$boeking['vlucht_id']) {
                        $heeftReisBoeking = true;
                    }
                }
                ?>

                <?php if ($heeftReisBoeking) { ?>
                    <form class="mt-5 grid gap-4" action="../app/page-includes/verwerken/verwerk-recensie.php" method="post">
                        <div class="grid gap-4 md:grid-cols-2">
                            <label class="grid gap-1">
                                <span class="text-sm font-semibold">Reis</span>
                                <select class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" name="reis_id">
                                    <?php foreach ($boekingen as $boeking) { ?>
                                        <?php if (!$boeking['vlucht_id']) { ?>
                                            <option value="<?= $boeking['reis_id'] ?>"><?= $boeking['titel'] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </label>

                            <label class="grid gap-1">
                                <span class="text-sm font-semibold">Score</span>
                                <select class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" name="rating">
                                    <option value="5">5 sterren</option>
                                    <option value="4">4 sterren</option>
                                    <option value="3">3 sterren</option>
                                    <option value="2">2 sterren</option>
                                    <option value="1">1 ster</option>
                                </select>
                            </label>
                        </div>

                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Bericht</span>
                            <textarea class="min-h-28 rounded-md border border-black p-3 outline-none focus:border-accent" name="bericht" placeholder="Schrijf kort hoe je reis was"></textarea>
                        </label>

                        <button class="h-11 rounded-md bg-accent px-4 text-sm font-bold text-white hover:bg-black" type="submit">Recensie plaatsen</button>
                    </form>
                <?php } else { ?>
                    <p class="mt-4 text-sm font-bold">Je kunt een review plaatsen na een geboekte pakketreis.</p>
                <?php } ?>
            </section>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
