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
                <p class="mt-3 max-w-2xl text-sm leading-6 text-black">Bekijk reizen, vluchten, boekingen en recensies.</p>
            </div>

            <div class="flex flex-wrap gap-2">
                <a class="h-11 rounded-md bg-accent px-4 py-3 text-sm font-bold text-white hover:bg-black" href="#formulier">Nieuwe reis</a>
                <a class="h-11 rounded-md bg-black px-4 py-3 text-sm font-bold text-white hover:bg-accent" href="#vluchtformulier">Nieuwe vlucht</a>
            </div>
        </div>
    </section>

    <section class="mx-auto grid max-w-7xl gap-6 px-6 py-8 lg:grid-cols-[220px_minmax(0,1fr)]">
        <aside class="h-fit rounded-md border border-black bg-white p-3 lg:sticky lg:top-24">
            <nav class="grid gap-1 text-sm font-bold">
                <a class="rounded-md bg-black px-3 py-3 text-white" href="#reizen">Reizen</a>
                <a class="rounded-md px-3 py-3 hover:bg-[#f6f4ef] hover:text-accent" href="#vluchten">Vluchten</a>
                <a class="rounded-md px-3 py-3 hover:bg-[#f6f4ef] hover:text-accent" href="#boekingen">Boekingen</a>
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
                    <p class="text-xs font-bold uppercase text-accent">Vluchten</p>
                    <p class="mt-2 font-fraunces text-4xl font-bold"><?= count($vluchten) ?></p>
                </article>

                <article class="rounded-md border border-black bg-white p-4">
                    <p class="text-xs font-bold uppercase text-accent">Open boekingen</p>
                    <p class="mt-2 font-fraunces text-4xl font-bold"><?= $openBoekingen['totaal'] ?></p>
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
                                        <div class="flex justify-end gap-2">
                                            <a class="rounded-md border border-black px-3 py-2 text-xs font-bold hover:border-accent hover:text-accent" href="index.php?reis_id=<?= $reis['id'] ?>#formulier">Wijzig</a>
                                            <form action="../../app/page-includes/verwerk-admin-reis.php" method="post">
                                                <input type="hidden" name="actie" value="verwijderen">
                                                <input type="hidden" name="id" value="<?= $reis['id'] ?>">
                                                <button class="rounded-md bg-black px-3 py-2 text-xs font-bold text-white hover:bg-accent" type="submit">Verwijder</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <article id="formulier" class="rounded-md border border-black bg-white p-5">
                <div class="border-b border-black pb-4">
                    <p class="text-xs font-bold uppercase text-accent">Reisformulier</p>
                    <h2 class="font-fraunces text-2xl font-bold"><?= $reis_bewerken ? 'Reis wijzigen' : 'Reis toevoegen' ?></h2>
                </div>

                <form class="mt-5 grid gap-4" action="../../app/page-includes/verwerk-admin-reis.php" method="post">
                    <input type="hidden" name="actie" value="<?= $reis_bewerken ? 'wijzigen' : 'toevoegen' ?>">
                    <input type="hidden" name="id" value="<?= $reis_bewerken ? $reis_bewerken['id'] : '' ?>">

                    <label class="grid gap-1">
                        <span class="text-sm font-semibold">Bestemming</span>
                        <select class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" name="bestemming_id" required>
                            <?php foreach ($bestemmingen as $bestemming) { ?>
                                <option value="<?= $bestemming['id'] ?>" <?= $reis_bewerken && $reis_bewerken['bestemming_id'] == $bestemming['id'] ? 'selected' : '' ?>><?= $bestemming['naam'] ?></option>
                            <?php } ?>
                        </select>
                    </label>

                    <div class="grid gap-4 md:grid-cols-2">
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Titel</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" name="titel" value="<?= $reis_bewerken ? $reis_bewerken['titel'] : '' ?>" required>
                        </label>
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Slug</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" name="slug" value="<?= $reis_bewerken ? $reis_bewerken['slug'] : '' ?>" required>
                        </label>
                    </div>

                    <label class="grid gap-1">
                        <span class="text-sm font-semibold">Korte beschrijving</span>
                        <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" name="korte_beschrijving" value="<?= $reis_bewerken ? $reis_bewerken['korte_beschrijving'] : '' ?>" required>
                    </label>

                    <label class="grid gap-1">
                        <span class="text-sm font-semibold">Beschrijving</span>
                        <textarea class="min-h-28 rounded-md border border-black p-3 outline-none focus:border-accent" name="beschrijving" required><?= $reis_bewerken ? $reis_bewerken['beschrijving'] : '' ?></textarea>
                    </label>

                    <div class="grid gap-4 md:grid-cols-2">
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Vertrek luchthaven</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" name="vertrek_luchthaven" value="<?= $reis_bewerken ? $reis_bewerken['vertrek_luchthaven'] : '' ?>" required>
                        </label>
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Aankomst luchthaven</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" name="aankomst_luchthaven" value="<?= $reis_bewerken ? $reis_bewerken['aankomst_luchthaven'] : '' ?>" required>
                        </label>
                    </div>

                    <div class="grid gap-4 md:grid-cols-3">
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Vertrekdatum</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="date" name="vertrekdatum" value="<?= $reis_bewerken ? $reis_bewerken['vertrekdatum'] : '' ?>" required>
                        </label>
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Terugkomstdatum</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="date" name="terugkomstdatum" value="<?= $reis_bewerken ? $reis_bewerken['terugkomstdatum'] : '' ?>">
                        </label>
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Dagen</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="number" name="duur_dagen" value="<?= $reis_bewerken ? $reis_bewerken['duur_dagen'] : '' ?>" required>
                        </label>
                    </div>

                    <div class="grid gap-4 md:grid-cols-3">
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Reisklasse</span>
                            <select class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" name="reisklasse">
                                <option <?= $reis_bewerken && $reis_bewerken['reisklasse'] === 'Economy' ? 'selected' : '' ?>>Economy</option>
                                <option <?= $reis_bewerken && $reis_bewerken['reisklasse'] === 'Premium Economy' ? 'selected' : '' ?>>Premium Economy</option>
                                <option <?= $reis_bewerken && $reis_bewerken['reisklasse'] === 'Business' ? 'selected' : '' ?>>Business</option>
                            </select>
                        </label>
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Prijs</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="number" step="0.01" name="prijs_vanaf" value="<?= $reis_bewerken ? $reis_bewerken['prijs_vanaf'] : '' ?>" required>
                        </label>
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Plekken</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="number" name="beschikbare_plekken" value="<?= $reis_bewerken ? $reis_bewerken['beschikbare_plekken'] : '' ?>" required>
                        </label>
                    </div>

                    <div class="grid gap-4 md:grid-cols-3">
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Bagage</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" name="bagage_inbegrepen" value="<?= $reis_bewerken ? $reis_bewerken['bagage_inbegrepen'] : '' ?>" required>
                        </label>
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Accommodatie</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" name="accommodatie" value="<?= $reis_bewerken ? $reis_bewerken['accommodatie'] : '' ?>">
                        </label>
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Afbeelding</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" name="afbeelding" value="<?= $reis_bewerken ? $reis_bewerken['afbeelding'] : 'assets/landingpage.jpg' ?>" required>
                        </label>
                    </div>

                    <label class="grid gap-1">
                        <span class="text-sm font-semibold">Status</span>
                        <select class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" name="status">
                            <option <?= $reis_bewerken && $reis_bewerken['status'] === 'actief' ? 'selected' : '' ?>>actief</option>
                            <option <?= $reis_bewerken && $reis_bewerken['status'] === 'concept' ? 'selected' : '' ?>>concept</option>
                            <option <?= $reis_bewerken && $reis_bewerken['status'] === 'uitverkocht' ? 'selected' : '' ?>>uitverkocht</option>
                            <option <?= $reis_bewerken && $reis_bewerken['status'] === 'geannuleerd' ? 'selected' : '' ?>>geannuleerd</option>
                            <option <?= $reis_bewerken && $reis_bewerken['status'] === 'archief' ? 'selected' : '' ?>>archief</option>
                        </select>
                    </label>

                    <button class="h-11 rounded-md bg-accent px-4 text-sm font-bold text-white hover:bg-black" type="submit">Reis opslaan</button>
                </form>
            </article>

            <section id="vluchten" class="min-w-0 rounded-md border border-black bg-white">
                <div class="border-b border-black p-5">
                    <p class="text-xs font-bold uppercase text-accent">Vluchten</p>
                    <h2 class="font-fraunces text-2xl font-bold">Vluchten beheren</h2>
                </div>

                <div class="max-w-full overflow-x-auto">
                    <table class="w-full min-w-[820px] border-collapse text-left text-sm">
                        <thead class="bg-black text-white">
                            <tr>
                                <th class="px-5 py-3 font-bold">Vlucht</th>
                                <th class="px-5 py-3 font-bold">Bestemming</th>
                                <th class="px-5 py-3 font-bold">Vertrek</th>
                                <th class="px-5 py-3 font-bold">Prijs</th>
                                <th class="px-5 py-3 font-bold">Actief</th>
                                <th class="px-5 py-3 text-right font-bold">Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($vluchten as $vlucht) { ?>
                                <tr class="border-b border-black">
                                    <td class="px-5 py-4"><?= $vlucht['vlucht_nummer'] ?></td>
                                    <td class="px-5 py-4"><?= $vlucht['stad'] ?></td>
                                    <td class="px-5 py-4"><?= $vlucht['vertrek_datum'] ?></td>
                                    <td class="px-5 py-4">&euro;<?= $vlucht['prijs'] ?></td>
                                    <td class="px-5 py-4"><?= $vlucht['is_actief'] ?></td>
                                    <td class="px-5 py-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a class="rounded-md border border-black px-3 py-2 text-xs font-bold hover:border-accent hover:text-accent" href="index.php?vlucht_id=<?= $vlucht['id'] ?>#vluchtformulier">Wijzig</a>
                                            <form action="../../app/page-includes/verwerk-admin-vlucht.php" method="post">
                                                <input type="hidden" name="actie" value="verwijderen">
                                                <input type="hidden" name="id" value="<?= $vlucht['id'] ?>">
                                                <button class="rounded-md bg-black px-3 py-2 text-xs font-bold text-white hover:bg-accent" type="submit">Verwijder</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <article id="vluchtformulier" class="rounded-md border border-black bg-white p-5">
                <div class="border-b border-black pb-4">
                    <p class="text-xs font-bold uppercase text-accent">Vluchtformulier</p>
                    <h2 class="font-fraunces text-2xl font-bold"><?= $vlucht_bewerken ? 'Vlucht wijzigen' : 'Vlucht toevoegen' ?></h2>
                </div>

                <form class="mt-5 grid gap-4" action="../../app/page-includes/verwerk-admin-vlucht.php" method="post">
                    <input type="hidden" name="actie" value="<?= $vlucht_bewerken ? 'wijzigen' : 'toevoegen' ?>">
                    <input type="hidden" name="id" value="<?= $vlucht_bewerken ? $vlucht_bewerken['id'] : '' ?>">

                    <label class="grid gap-1">
                        <span class="text-sm font-semibold">Bestemming</span>
                        <select class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" name="bestemming_id" required>
                            <?php foreach ($bestemmingen as $bestemming) { ?>
                                <option value="<?= $bestemming['id'] ?>" <?= $vlucht_bewerken && $vlucht_bewerken['bestemming_id'] == $bestemming['id'] ? 'selected' : '' ?>><?= $bestemming['naam'] ?></option>
                            <?php } ?>
                        </select>
                    </label>

                    <div class="grid gap-4 md:grid-cols-2">
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Vertrek luchthaven</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" name="vertrek_luchthaven" value="<?= $vlucht_bewerken ? $vlucht_bewerken['vertrek_luchthaven'] : '' ?>" required>
                        </label>
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Aankomst luchthaven</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" name="aankomst_luchthaven" value="<?= $vlucht_bewerken ? $vlucht_bewerken['aankomst_luchthaven'] : '' ?>" required>
                        </label>
                    </div>

                    <div class="grid gap-4 md:grid-cols-2">
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Vertrek datum/tijd</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" name="vertrek_datum" value="<?= $vlucht_bewerken ? $vlucht_bewerken['vertrek_datum'] : '' ?>" placeholder="2026-07-10 09:30:00" required>
                        </label>
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Aankomst datum/tijd</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" name="aankomst_datum" value="<?= $vlucht_bewerken ? $vlucht_bewerken['aankomst_datum'] : '' ?>" placeholder="2026-07-10 11:45:00" required>
                        </label>
                    </div>

                    <div class="grid gap-4 md:grid-cols-4">
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Prijs</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="number" step="0.01" name="prijs" value="<?= $vlucht_bewerken ? $vlucht_bewerken['prijs'] : '' ?>" required>
                        </label>
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Stoelen</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="number" name="stoelen" value="<?= $vlucht_bewerken ? $vlucht_bewerken['stoelen'] : '' ?>" required>
                        </label>
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Vlucht nummer</span>
                            <input class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" name="vlucht_nummer" value="<?= $vlucht_bewerken ? $vlucht_bewerken['vlucht_nummer'] : '' ?>" required>
                        </label>
                        <label class="grid gap-1">
                            <span class="text-sm font-semibold">Actief</span>
                            <select class="h-11 rounded-md border border-black px-3 outline-none focus:border-accent" name="is_actief">
                                <option value="1" <?= $vlucht_bewerken && $vlucht_bewerken['is_actief'] == 1 ? 'selected' : '' ?>>1</option>
                                <option value="0" <?= $vlucht_bewerken && $vlucht_bewerken['is_actief'] == 0 ? 'selected' : '' ?>>0</option>
                            </select>
                        </label>
                    </div>

                    <button class="h-11 rounded-md bg-accent px-4 text-sm font-bold text-white hover:bg-black" type="submit">Vlucht opslaan</button>
                </form>
            </article>

            <section class="grid gap-6 xl:grid-cols-[minmax(0,0.95fr)_minmax(320px,0.65fr)]">
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
            </section>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../../app/includes/footer.php"; ?>
