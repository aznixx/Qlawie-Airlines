<?php
include __DIR__ . "/../../app/page-includes/laad-admin-overzicht.php";
include __DIR__ . "/../../app/includes/navbar.php";
?>

<main class="min-h-screen bg-[#f6f4ef] text-black">
    <section class="border-b border-black bg-white px-6 py-8">
        <div class="mx-auto flex max-w-7xl flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="text-xs font-bold uppercase text-accent">Qlawie beheer</p>
                <h1 class="mt-2 font-fraunces text-4xl font-bold sm:text-5xl">Admin dashboard</h1>
                <p class="mt-3 max-w-2xl text-sm leading-6 text-black">
                    Bekijk reizen, boekingen en recensies.
                </p>
            </div>

            <div class="flex flex-wrap gap-2">
                <a class="h-11 rounded-md bg-accent px-4 py-3 text-sm font-bold text-white hover:bg-black" href="#formulier">Nieuwe reis</a>
            </div>
        </div>
    </section>

    <section class="mx-auto grid max-w-7xl gap-6 px-6 py-8 lg:grid-cols-[220px_minmax(0,1fr)]">
        <aside class="h-fit rounded-md border border-black bg-white p-3 lg:sticky lg:top-24">
            <nav class="grid gap-1 text-sm font-bold">
                <a class="rounded-md bg-black px-3 py-3 text-white" href="#reizen">Reizen</a>
                <a class="rounded-md px-3 py-3 hover:bg-[#f6f4ef] hover:text-accent" href="#boekingen">Boekingen</a>
                <a class="rounded-md px-3 py-3 hover:bg-[#f6f4ef] hover:text-accent" href="#formulier">Reisformulier</a>
                <a class="rounded-md px-3 py-3 hover:bg-[#f6f4ef] hover:text-accent" href="#reviews">Reviews</a>
            </nav>

            <div class="mt-4 border-t border-black pt-4">
                <p class="text-xs font-bold uppercase text-accent">Acties</p>
                <p class="mt-2 font-fraunces text-2xl font-bold"><?= $acties ?></p>
                <p class="mt-1 text-xs leading-5 text-black">Open boekingen en reviews.</p>
            </div>
        </aside>

        <div class="min-w-0 space-y-6">
            <section class="grid gap-3 sm:grid-cols-2 xl:grid-cols-4">
                <article class="rounded-md border border-black bg-white p-4">
                    <p class="text-xs font-bold uppercase text-accent">Reizen</p>
                    <p class="mt-2 font-fraunces text-4xl font-bold"><?= count($reizen) ?></p>
                </article>

                <article class="rounded-md border border-black bg-white p-4">
                    <p class="text-xs font-bold uppercase text-accent">Open boekingen</p>
                    <p class="mt-2 font-fraunces text-4xl font-bold"><?= $openBoekingen['totaal'] ?></p>
                </article>

                <article class="rounded-md border border-black bg-white p-4">
                    <p class="text-xs font-bold uppercase text-accent">Omzet</p>
                    <p class="mt-2 font-fraunces text-4xl font-bold">&euro;<?= $omzet['totaal'] ?? 0 ?></p>
                </article>

                <article class="rounded-md border border-black bg-white p-4">
                    <p class="text-xs font-bold uppercase text-accent">Reviews</p>
                    <p class="mt-2 font-fraunces text-4xl font-bold"><?= $reviewsWachtrij['totaal'] ?></p>
                </article>
            </section>

            <section id="reizen" class="min-w-0 rounded-md border border-black bg-white">
                <div class="border-b border-black p-5">
                    <p class="text-xs font-bold uppercase text-accent">Aanbod</p>
                    <h2 class="font-fraunces text-2xl font-bold">Reizen beheren</h2>
                </div>

                <div class="max-w-full overflow-x-auto">
                    <table class="w-full min-w-[820px] border-collapse text-left text-sm">
                        <thead class="bg-black text-white">
                            <tr>
                                <th class="px-5 py-3 font-bold">Reis</th>
                                <th class="px-5 py-3 font-bold">Land</th>
                                <th class="px-5 py-3 font-bold">Duur</th>
                                <th class="px-5 py-3 font-bold">Prijs</th>
                                <th class="px-5 py-3 font-bold">Status</th>
                                <th class="px-5 py-3 text-right font-bold">Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($reizen as $reis) { ?>
                                <tr class="border-b border-black">
                                    <td class="px-5 py-4">
                                        <p class="font-bold"><?= $reis['titel'] ?></p>
                                        <p class="text-xs text-black"><?= $reis['slug'] ?></p>
                                    </td>
                                    <td class="px-5 py-4"><?= $reis['land'] ?></td>
                                    <td class="px-5 py-4"><?= $reis['duur_dagen'] ?> dagen</td>
                                    <td class="px-5 py-4">&euro;<?= $reis['prijs_vanaf'] ?></td>
                                    <td class="px-5 py-4"><?= $reis['status'] ?></td>
                                    <td class="px-5 py-4 text-right">
                                        <button class="rounded-md border border-black px-3 py-2 text-xs font-bold hover:border-accent hover:text-accent" type="button">Wijzig</button>
                                        <button class="rounded-md bg-black px-3 py-2 text-xs font-bold text-white hover:bg-accent" type="button">Verwijder</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="grid gap-6 xl:grid-cols-[minmax(0,0.95fr)_minmax(320px,0.65fr)]">
                <article id="formulier" class="rounded-md border border-black bg-white p-5">
                    <div class="border-b border-black pb-4">
                        <p class="text-xs font-bold uppercase text-accent">Reisformulier</p>
                        <h2 class="font-fraunces text-2xl font-bold">Reis toevoegen</h2>
                    </div>

                    <form class="mt-5 grid gap-4">
                        <div class="grid gap-4 md:grid-cols-2">
                            <label class="grid gap-1">
                                <span class="text-sm font-semibold">Naam</span>
                                <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" placeholder="Naam">
                            </label>
                            <label class="grid gap-1">
                                <span class="text-sm font-semibold">Slug</span>
                                <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" placeholder="slug">
                            </label>
                        </div>

                        <div class="grid gap-4 md:grid-cols-3">
                            <label class="grid gap-1">
                                <span class="text-sm font-semibold">Land</span>
                                <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" placeholder="Land">
                            </label>
                            <label class="grid gap-1">
                                <span class="text-sm font-semibold">Prijs</span>
                                <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="number" placeholder="Prijs">
                            </label>
                            <label class="grid gap-1">
                                <span class="text-sm font-semibold">Dagen</span>
                                <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="number" placeholder="Dagen">
                            </label>
                        </div>

                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Beschrijving</span>
                            <textarea class="min-h-28 rounded-md border border-black p-3 outline-none focus:border-accent" placeholder="Beschrijving"></textarea>
                        </label>

                        <button class="h-11 rounded-md bg-accent px-4 text-sm font-bold text-white hover:bg-black" type="button">Reis opslaan</button>
                    </form>
                </article>

                <div class="grid gap-6">
                    <article id="boekingen" class="rounded-md border border-black bg-white">
                        <div class="border-b border-black p-5">
                            <p class="text-xs font-bold uppercase text-accent">Boekingen</p>
                            <h2 class="font-fraunces text-2xl font-bold">Nieuw binnen</h2>
                        </div>

                        <div class="divide-y divide-black">
                            <?php if (empty($boekingen)) { ?>
                                <div class="p-5">
                                    <p class="font-bold">Geen boekingen gevonden.</p>
                                </div>
                            <?php } ?>

                            <?php foreach ($boekingen as $boeking) { ?>
                                <?php
                                $naam = $boeking['klant_naam'];
                                $titel = $boeking['titel'];

                                if ($boeking['voornaam']) {
                                    $naam = $boeking['voornaam'] . " " . $boeking['achternaam'];
                                }

                                if ($boeking['vlucht_id']) {
                                    $titel = "Vlucht naar " . $boeking['stad'];
                                }
                                ?>
                                <div class="p-5">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <p class="font-bold"><?= $naam ?></p>
                                            <p class="mt-1 text-sm"><?= $titel ?> - <?= $boeking['aantal_reizigers'] ?> reiziger(s)</p>
                                        </div>
                                        <span class="rounded-md bg-accent px-3 py-1 text-xs font-bold text-white"><?= $boeking['status'] ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </article>

                    <article id="reviews" class="rounded-md border border-black bg-white p-5">
                        <p class="text-xs font-bold uppercase text-accent">Reviews</p>
                        <h2 class="font-fraunces text-2xl font-bold">Wachtrij</h2>

                        <div class="mt-5 grid gap-3">
                            <?php if (empty($recensies)) { ?>
                                <p class="text-sm font-bold">Geen reviews gevonden.</p>
                            <?php } ?>

                            <?php foreach ($recensies as $recensie) { ?>
                                <div class="border-l-4 border-accent bg-[#f6f4ef] p-4">
                                    <p class="text-sm font-semibold"><?= $recensie['bericht'] ?></p>
                                    <p class="mt-2 text-xs"><?= $recensie['naam'] ?> - <?= $recensie['status'] ?></p>
                                </div>
                            <?php } ?>
                        </div>
                    </article>
                </div>
            </section>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../../app/includes/footer.php"; ?>
