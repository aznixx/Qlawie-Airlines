<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qlawie Airlines</title>
    <link rel="stylesheet" href="public/output.css">
</head>

<body class="bg-white text-slate-950">
    <nav class="sticky top-0 z-20 w-full border-b border-accent bg-white shadow-sm">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-6 py-3">
            <a class="block shrink-0" href="#" aria-label="Qlawie Airlines home">
                <img class="h-20 absolute top-1 w-40 rounded-md object-cover object-center" src="assets/logo.png"
                    alt="Qlawie Airlines logo">
            </a>

            <div class="hidden items-center gap-6 md:flex">
                <a class="text-sm font-semibold text-accent transition hover:text-black" href="#">Home</a>
                <a class="text-sm font-semibold text-black transition hover:text-accent" href="#">Bestemmingen</a>
                <a class="text-sm font-semibold text-black transition hover:text-accent" href="#">Aanbiedingen</a>
                <a class="text-sm font-semibold text-black transition hover:text-accent" href="#">Reviews</a>
                <a class="text-sm font-semibold text-black transition hover:text-accent" href="#">Contact</a>
            </div>

            <div class="flex items-center gap-4">
                <a class="hidden text-sm font-semibold text-slate-700 transition hover:text-accent sm:block"
                    href="#">Inloggen</a>
                <a class="rounded-md bg-accent px-4 py-2 text-sm font-semibold text-white transition hover:bg-black"
                    href="#">Registreren</a>
            </div>
        </div>
    </nav>
    <main>
        <!-- Landing section en nee dit is niet met ai niek wij kunnen ook gewoon engels-->
        <section class="relative flex min-h-[calc(100vh-81px)] flex-col items-center justify-center gap-8 overflow-hidden px-6 py-10">
            <img class="absolute inset-0 h-full w-full object-cover object-center" src="assets/landingpage.jpg" alt="">
            <div class="absolute inset-0 bg-black/35"></div>
            <div class="relative mx-auto max-w-5xl px-6 text-center text-white">
                <h1
                    class="font-serif text-6xl font-bold leading-none drop-shadow-lg sm:text-7xl md:text-8xl lg:text-9xl">
                    Qlawie airlines
                </h1>

                <div class="mx-auto mt-8 grid max-w-3xl gap-2 text-white drop-shadow-md">
                    <span class="font-serif text-2xl italic sm:text-3xl">Vlieg vrij.</span>
                    <span class="font-fraunces text-5xl font-semibold text-accent sm:text-6xl md:text-7xl">Reis
                        stijlvol.</span>
                    <span class="font-sans text-lg font-semibold uppercase tracking-[0.35em] sm:text-xl">Land
                        ontspannen.</span>
                </div>
            </div>
            <!-- Booking ding -->
            <div class="relative z-10 w-full max-w-5xl rounded-lg bg-white p-4 text-slate-950 shadow-2xl md:p-5">
                <div class="mb-4 flex flex-wrap items-center gap-2">
                    <button class="rounded-md bg-accent px-4 py-2 text-sm font-bold text-white" type="button">Retour</button>
                    <button class="rounded-md border border-slate-200 px-4 py-2 text-sm font-bold text-slate-700 transition hover:border-accent hover:text-accent" type="button">Enkele reis</button>
                    <button class="rounded-md border border-slate-200 px-4 py-2 text-sm font-bold text-slate-700 transition hover:border-accent hover:text-accent" type="button">Multi-city</button>
                </div>

                <form class="grid gap-3 lg:grid-cols-[1fr_1fr_0.9fr_0.9fr_0.8fr_auto]">
                    <label class="grid gap-1">
                        <span class="text-xs font-bold uppercase tracking-wide text-slate-500">Van</span>
                        <input class="h-12 rounded-md border border-slate-200 px-3 text-sm font-semibold outline-none transition focus:border-accent" type="text" value="Amsterdam" aria-label="Vertrekplaats">
                    </label>

                    <label class="grid gap-1">
                        <span class="text-xs font-bold uppercase tracking-wide text-slate-500">Naar</span>
                        <input class="h-12 rounded-md border border-slate-200 px-3 text-sm font-semibold outline-none transition focus:border-accent" type="text" placeholder="Bestemming" aria-label="Bestemming">
                    </label>

                    <label class="grid gap-1">
                        <span class="text-xs font-bold uppercase tracking-wide text-slate-500">Vertrek</span>
                        <input class="h-12 rounded-md border border-slate-200 px-3 text-sm font-semibold outline-none transition focus:border-accent" type="date" aria-label="Vertrekdatum">
                    </label>

                    <label class="grid gap-1">
                        <span class="text-xs font-bold uppercase tracking-wide text-slate-500">Terug</span>
                        <input class="h-12 rounded-md border border-slate-200 px-3 text-sm font-semibold outline-none transition focus:border-accent" type="date" aria-label="Terugdatum">
                    </label>

                    <label class="grid gap-1">
                        <span class="text-xs font-bold uppercase tracking-wide text-slate-500">Reizigers</span>
                        <select class="h-12 rounded-md border border-slate-200 px-3 text-sm font-semibold outline-none transition focus:border-accent" aria-label="Aantal reizigers">
                            <option>1 reiziger</option>
                            <option>2 reizigers</option>
                            <option>3 reizigers</option>
                            <option>4 reizigers</option>
                        </select>
                    </label>

                    <button class="mt-5 h-12 rounded-md bg-accent px-6 text-sm font-bold text-white transition hover:bg-black lg:mt-6" type="submit">
                        Zoek vlucht
                    </button>
                </form>
            </div>
        </section>
        <!-- Little booking selection -->
        <section>

        </section>
        <!-- Landing section -->
        <section>

        </section>
        <!-- Landing section -->
        <section>

        </section>

    </main>


</body>

</html>
