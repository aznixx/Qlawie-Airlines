<?php
$pageTitle = "Boeken - Qlawie Airlines";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main class="px-6 py-12">
    <section class="mx-auto max-w-4xl">
        <p class="text-xs font-bold uppercase tracking-wide text-accent">Boeken</p>
        <h1 class="font-fraunces text-4xl font-bold">Reis boeken</h1>
        <p class="mt-3 text-slate-700">Vul je gegevens in om een reisaanvraag te maken.</p>

        <form class="mt-8 grid gap-4 rounded-md border border-slate-200 p-5 md:grid-cols-2" action="contact.php" method="get">
            <label class="grid gap-1">
                <span class="text-sm font-semibold">Naam</span>
                <input class="h-12 rounded-md border border-slate-200 px-3 outline-none focus:border-accent" type="text" name="naam" required>
            </label>
            <label class="grid gap-1">
                <span class="text-sm font-semibold">E-mail</span>
                <input class="h-12 rounded-md border border-slate-200 px-3 outline-none focus:border-accent" type="email" name="email" required>
            </label>
            <label class="grid gap-1">
                <span class="text-sm font-semibold">Aantal reizigers</span>
                <select class="h-12 rounded-md border border-slate-200 px-3 outline-none focus:border-accent" name="reizigers">
                    <option>1 reiziger</option>
                    <option>2 reizigers</option>
                    <option>3 reizigers</option>
                    <option>4 reizigers</option>
                </select>
            </label>
            <label class="grid gap-1">
                <span class="text-sm font-semibold">Datum</span>
                <input class="h-12 rounded-md border border-slate-200 px-3 outline-none focus:border-accent" type="date" name="datum" required>
            </label>
            <button class="h-12 rounded-md bg-accent px-5 text-sm font-bold text-white hover:bg-black md:col-span-2" type="submit">Boeking afronden</button>
        </form>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
