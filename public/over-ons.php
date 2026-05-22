<?php
$pageTitle = "Over ons - Qlawie Airlines";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main class="px-6 py-12">
    <section class="mx-auto max-w-5xl">
        <p class="text-xs font-bold uppercase tracking-wide text-accent">Over ons</p>
        <h1 class="font-fraunces text-4xl font-bold">Wie zijn wij?</h1>
        <p class="mt-4 max-w-3xl text-slate-700">
            Qlawie Airlines is een klein reisbureau dat reizen simpel en duidelijk wil maken.
            We helpen klanten met bestemmingen, vluchten, hotels en vragen voor vertrek.
        </p>

        <div class="mt-8 grid gap-4 md:grid-cols-3">
            <div class="rounded-md border border-slate-200 p-4">
                <h2 class="font-fraunces text-xl font-semibold">Duidelijk</h2>
                <p class="mt-2 text-sm text-slate-600">Geen onnodige kleine lettertjes, gewoon weten wat je boekt.</p>
            </div>
            <div class="rounded-md border border-slate-200 p-4">
                <h2 class="font-fraunces text-xl font-semibold">Betaalbaar</h2>
                <p class="mt-2 text-sm text-slate-600">We zoeken reizen die passen bij normale budgetten.</p>
            </div>
            <div class="rounded-md border border-slate-200 p-4">
                <h2 class="font-fraunces text-xl font-semibold">Bereikbaar</h2>
                <p class="mt-2 text-sm text-slate-600">Via de contactpagina kun je ons makkelijk een bericht sturen.</p>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
