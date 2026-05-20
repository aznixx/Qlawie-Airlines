<?php
$pageTitle = "Qlawie Airlines";
include "header.php";
?>

    <main>
        <!-- Landing section en nee dit is niet met ai niek -->
        <section class="relative flex min-h-[650px] flex-col items-center justify-center gap-6 overflow-hidden px-6 py-10">
            <img class="absolute inset-0 h-full w-full object-cover object-center" src="assets/landingpage.jpg" alt="">
            <div class="absolute inset-0 bg-black/35"></div>
            <div class="relative mx-auto max-w-5xl px-6 text-center text-white">
                <h1
                    class="font-fraunces text-5xl font-bold leading-none drop-shadow-lg sm:text-6xl md:text-7xl">
                    Qlawie airlines
                </h1>

                <div class="mx-auto mt-5 grid max-w-3xl gap-2 text-white drop-shadow-md">
                    <span class="font-fraunces text-3xl font-semibold text-accent sm:text-4xl">Reis stijlvol.</span>
                    <span class="font-sans text-base font-semibold uppercase tracking-wide sm:text-lg">Boek makkelijk je volgende reis.</span>
                </div>
            </div>
            <!-- Booking ding -->
            <div class="relative z-10 w-full max-w-5xl rounded-lg bg-white p-5 font-sans text-slate-950 shadow-lg">
                <div class="mb-4 flex flex-col gap-3 border-b border-slate-200 pb-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wide text-accent">Qlawie booking</p>
                        <h2 class="font-fraunces text-2xl font-semibold text-slate-950">Boek je vlucht</h2>
                    </div>

                    <div class="flex flex-wrap gap-2 text-sm font-bold">
                        <button class="rounded-md bg-accent px-4 py-2 text-white" type="button">Retour</button>
                        <button class="rounded-md border border-slate-200 px-4 py-2 text-slate-700 hover:border-accent hover:text-accent" type="button">Enkel</button>
                        <button class="rounded-md border border-slate-200 px-4 py-2 text-slate-700 hover:border-accent hover:text-accent" type="button">Multi</button>
                    </div>
                </div>

                <form class="grid gap-3 md:grid-cols-2 lg:grid-cols-4" action="resultaten.php" method="get">
                    <label class="grid gap-1">
                        <span class="text-xs font-bold uppercase tracking-wide text-slate-500">Van</span>
                        <input class="h-12 rounded-md border border-slate-200 px-3 text-sm font-semibold outline-none focus:border-accent" type="text" value="Amsterdam" aria-label="Vertrekplaats">
                    </label>

                    <label class="grid gap-1">
                        <span class="text-xs font-bold uppercase tracking-wide text-slate-500">Naar</span>
                        <input class="h-12 rounded-md border border-slate-200 px-3 text-sm font-semibold outline-none focus:border-accent" type="text" name="zoek" placeholder="Bestemming" aria-label="Bestemming">
                    </label>

                    <label class="grid gap-1">
                        <span class="text-xs font-bold uppercase tracking-wide text-slate-500">Vertrek</span>
                        <input class="h-12 rounded-md border border-slate-200 px-3 text-sm font-semibold outline-none focus:border-accent" type="date" aria-label="Vertrekdatum">
                    </label>

                    <label class="grid gap-1">
                        <span class="text-xs font-bold uppercase tracking-wide text-slate-500">Terug</span>
                        <input class="h-12 rounded-md border border-slate-200 px-3 text-sm font-semibold outline-none focus:border-accent" type="date" aria-label="Terugdatum">
                    </label>

                    <label class="grid gap-1 md:col-span-1 lg:col-span-2">
                        <span class="text-xs font-bold uppercase tracking-wide text-slate-500">Reizigers</span>
                        <select class="h-12 rounded-md border border-slate-200 px-3 text-sm font-semibold outline-none focus:border-accent" aria-label="Aantal reizigers">
                            <option>1 reiziger, Economy</option>
                            <option>2 reizigers, Economy</option>
                            <option>3 reizigers, Economy</option>
                            <option>4 reizigers, Economy</option>
                            <option>1 reiziger, Business</option>
                        </select>
                    </label>

                    <label class="grid gap-1">
                        <span class="text-xs font-bold uppercase tracking-wide text-slate-500">Bagage</span>
                        <select class="h-12 rounded-md border border-slate-200 px-3 text-sm font-semibold outline-none focus:border-accent" aria-label="Bagage">
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
                        <p class="text-xs font-bold uppercase tracking-wide text-accent">Aanbiedingen</p>
                        <h2 class="font-fraunces text-4xl font-bold">Populaire reizen</h2>
                    </div>
                    <a class="text-sm font-bold text-accent" href="bestemmingen.php">Alle bestemmingen bekijken</a>
                </div>
                <div class="mt-6 grid gap-5 md:grid-cols-3">
                    <div class="overflow-hidden rounded-md border border-slate-200 bg-white">
                        <img class="h-40 w-full object-cover" src="assets/landingpage.jpg" alt="">
                        <div class="p-5">
                            <p class="text-sm font-bold text-accent">Vanaf EUR 299</p>
                            <h3 class="font-fraunces text-2xl font-semibold">Barcelona citytrip</h3>
                            <p class="mt-2 text-sm text-slate-600">Zon, tapas en een hotel dicht bij het centrum.</p>
                            <a class="mt-4 inline-block rounded-md bg-accent px-4 py-2 text-sm font-bold text-white hover:bg-black" href="boeken.php?id=1">Boeken</a>
                        </div>
                    </div>
                    <div class="overflow-hidden rounded-md border border-slate-200 bg-white">
                        <img class="h-40 w-full object-cover" src="assets/landingpage.jpg" alt="">
                        <div class="p-5">
                            <p class="text-sm font-bold text-accent">Vanaf EUR 349</p>
                            <h3 class="font-fraunces text-2xl font-semibold">Rome weekend</h3>
                            <p class="mt-2 text-sm text-slate-600">Een korte reis langs oude gebouwen, pleinen en lekker eten.</p>
                            <a class="mt-4 inline-block rounded-md bg-accent px-4 py-2 text-sm font-bold text-white hover:bg-black" href="boeken.php?id=2">Boeken</a>
                        </div>
                    </div>
                    <div class="overflow-hidden rounded-md border border-slate-200 bg-white">
                        <img class="h-40 w-full object-cover" src="assets/landingpage.jpg" alt="">
                        <div class="p-5">
                            <p class="text-sm font-bold text-accent">Vanaf EUR 499</p>
                            <h3 class="font-fraunces text-2xl font-semibold">Marrakech vakantie</h3>
                            <p class="mt-2 text-sm text-slate-600">Warme avonden, markten en een rustig verblijf met ontbijt.</p>
                            <a class="mt-4 inline-block rounded-md bg-accent px-4 py-2 text-sm font-bold text-white hover:bg-black" href="boeken.php?id=3">Boeken</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- info section -->
        <section class="bg-slate-50 px-6 py-12">
            <div class="mx-auto grid max-w-6xl gap-5 md:grid-cols-4">
                <div class="md:col-span-1">
                    <h2 class="font-fraunces text-3xl font-bold">Waarom Qlawie?</h2>
                    <p class="mt-3 text-sm text-slate-600">Duidelijke reizen, simpele boekingen en hulp als je vragen hebt.</p>
                </div>
                <div class="rounded-md bg-white p-5">
                    <h3 class="font-fraunces text-xl font-semibold">Bestemmingen</h3>
                    <p class="mt-2 text-sm text-slate-600">Lees informatie over locaties voordat je boekt.</p>
                    <a class="mt-3 inline-block text-sm font-bold text-accent" href="bestemmingen.php">Bekijk bestemmingen</a>
                </div>
                <div class="rounded-md bg-white p-5">
                    <h3 class="font-fraunces text-xl font-semibold">Boeken</h3>
                    <p class="mt-2 text-sm text-slate-600">Kies een bestemming en rond je boeking makkelijk af.</p>
                    <a class="mt-3 inline-block text-sm font-bold text-accent" href="bestemmingen.php">Boek een reis</a>
                </div>
                <div class="rounded-md bg-white p-5">
                    <h3 class="font-fraunces text-xl font-semibold">Contact</h3>
                    <p class="mt-2 text-sm text-slate-600">Stuur makkelijk een bericht naar de reisorganisatie.</p>
                    <a class="mt-3 inline-block text-sm font-bold text-accent" href="contact.php">Neem contact op</a>
                </div>
            </div>
        </section>
    </main>

<?php include "footer.php"; ?>
