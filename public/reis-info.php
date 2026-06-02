<?php include __DIR__ . "/../app/page-includes/haal-reisinformatie-op.php"; ?>

<main class="bg-slate-50">
    <section class="relative overflow-hidden px-6 py-16 text-white">
        <img class="absolute inset-0 h-full w-full object-cover" src="assets/landingpage.jpg" alt="">
        <div class="absolute inset-0 bg-black/55"></div>

        <div class="relative mx-auto grid max-w-6xl gap-8 lg:grid-cols-[minmax(0,1fr)_320px] lg:items-end">
            <div>
                <a class="inline-flex rounded-full border border-white/30 px-4 py-2 text-xs font-bold uppercase tracking-[0.24em] text-white/80 transition hover:border-white hover:text-white" href="bestemmingen.php">Terug naar bestemmingen</a>
                <p class="mt-8 text-xs font-bold uppercase tracking-[0.3em] text-accent">Reisoverzicht</p>
                <h1 class="mt-4 max-w-3xl font-fraunces text-5xl font-bold leading-tight sm:text-6xl">Jouw volgende reis begint hier.</h1>
                <p class="mt-5 max-w-2xl text-base text-white/85 sm:text-lg">
                    Gebruik deze pagina straks voor alle details van de gekozen reis, zoals planning, inbegrepen onderdelen, verblijf en vertrekinformatie.
                </p>
            </div>

            <div class="rounded-2xl bg-white p-6 text-slate-950 shadow-2xl">
                <p class="text-xs font-bold uppercase tracking-[0.24em] text-accent">Snel overzicht</p>
                <div class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-1">
                    <div class="rounded-xl border border-slate-200 p-4">
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Reisduur</p>
                        <p class="mt-2 font-fraunces text-3xl font-semibold">7 dagen</p>
                    </div>
                    <div class="rounded-xl border border-slate-200 p-4">
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Vanaf prijs</p>
                        <p class="mt-2 font-fraunces text-3xl font-semibold">&euro;999</p>
                    </div>
                    <div class="rounded-xl border border-slate-200 p-4">
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Type reis</p>
                        <p class="mt-2 text-base font-semibold">Vlucht + verblijf</p>
                    </div>
                </div>
                <a class="mt-6 inline-flex w-full items-center justify-center rounded-md bg-accent px-5 py-3 text-sm font-bold text-white transition hover:bg-black" href="boeken.php">Boek deze reis</a>
            </div>
        </div>
    </section>

    <section class="px-6 py-12">
        <div class="mx-auto grid max-w-6xl gap-8 lg:grid-cols-[minmax(0,1fr)_300px]">
            <div class="space-y-8">
                <article class="rounded-2xl bg-white p-8 shadow-sm ring-1 ring-slate-200">
                    <p class="text-xs font-bold uppercase tracking-[0.24em] text-accent">Over de reis</p>
                    <h2 class="mt-3 font-fraunces text-3xl font-bold">Wat reizigers kunnen verwachten</h2>
                    <p class="mt-4 text-slate-700">
                        Hier kun je later de volledige beschrijving van de gekozen bestemming tonen. Denk aan sfeer, hoogtepunten, hotelinformatie en wat deze reis bijzonder maakt.
                    </p>
                    <div class="mt-6 grid gap-4 md:grid-cols-3">
                        <div class="rounded-xl bg-slate-50 p-4">
                            <p class="text-sm font-semibold text-slate-500">Vlucht</p>
                            <p class="mt-2 text-lg font-semibold text-slate-950">Direct of met overstap</p>
                        </div>
                        <div class="rounded-xl bg-slate-50 p-4">
                            <p class="text-sm font-semibold text-slate-500">Verblijf</p>
                            <p class="mt-2 text-lg font-semibold text-slate-950">Hotel of resort</p>
                        </div>
                        <div class="rounded-xl bg-slate-50 p-4">
                            <p class="text-sm font-semibold text-slate-500">Transfer</p>
                            <p class="mt-2 text-lg font-semibold text-slate-950">Luchthaven naar verblijf</p>
                        </div>
                    </div>
                </article>

                <article class="rounded-2xl bg-white p-8 shadow-sm ring-1 ring-slate-200">
                    <p class="text-xs font-bold uppercase tracking-[0.24em] text-accent">Dagindeling</p>
                    <h2 class="mt-3 font-fraunces text-3xl font-bold">Voorbeeld van de reisplanning</h2>
                    <div class="mt-6 grid gap-4">
                        <div class="rounded-xl border border-slate-200 p-5">
                            <p class="text-sm font-bold text-accent">Dag 1</p>
                            <h3 class="mt-2 text-xl font-semibold">Aankomst en check-in</h3>
                            <p class="mt-2 text-sm text-slate-600">Voeg hier later de eerste reisdag toe, inclusief vluchtinformatie en aankomsttijd.</p>
                        </div>
                        <div class="rounded-xl border border-slate-200 p-5">
                            <p class="text-sm font-bold text-accent">Dag 2 t/m 6</p>
                            <h3 class="mt-2 text-xl font-semibold">Vrije dagen of excursies</h3>
                            <p class="mt-2 text-sm text-slate-600">Gebruik dit blok voor activiteiten, stranddagen, excursies of lokale tips.</p>
                        </div>
                        <div class="rounded-xl border border-slate-200 p-5">
                            <p class="text-sm font-bold text-accent">Laatste dag</p>
                            <h3 class="mt-2 text-xl font-semibold">Terugreis</h3>
                            <p class="mt-2 text-sm text-slate-600">Plaats hier later de terugvlucht, uitchecktijd en extra vertrekdetails.</p>
                        </div>
                    </div>
                </article>
            </div>

            <aside class="space-y-6">
                <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                    <p class="text-xs font-bold uppercase tracking-[0.24em] text-accent">Inbegrepen</p>
                    <ul class="mt-4 space-y-3 text-sm text-slate-700">
                        <li class="rounded-xl bg-slate-50 px-4 py-3">Retourvlucht</li>
                        <li class="rounded-xl bg-slate-50 px-4 py-3">Verblijf op locatie</li>
                        <li class="rounded-xl bg-slate-50 px-4 py-3">Handbagage</li>
                        <li class="rounded-xl bg-slate-50 px-4 py-3">Klantenservice voor vertrek</li>
                    </ul>
                </div>

                <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                    <p class="text-xs font-bold uppercase tracking-[0.24em] text-accent">Belangrijke info</p>
                    <div class="mt-4 space-y-4 text-sm text-slate-700">
                        <div>
                            <p class="font-semibold text-slate-950">Vertrekpunt</p>
                            <p class="mt-1">Vul hier later het juiste vliegveld in.</p>
                        </div>
                        <div>
                            <p class="font-semibold text-slate-950">Bagage</p>
                            <p class="mt-1">Laat hier zien wat standaard inbegrepen is en wat optioneel kan worden bijgeboekt.</p>
                        </div>
                        <div>
                            <p class="font-semibold text-slate-950">Annuleren</p>
                            <p class="mt-1">Voeg later de voorwaarden of een link naar je annuleringsbeleid toe.</p>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
