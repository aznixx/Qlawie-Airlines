<?php
$pageTitle = "Admin - Qlawie Airlines";
$basePath = "../";
include __DIR__ . "/../../app/includes/navbar.php";
?>

<main class="px-6 py-12">
    <section class="mx-auto max-w-5xl">
        <p class="text-xs font-bold uppercase tracking-wide text-accent">Admin</p>
        <h1 class="font-fraunces text-4xl font-bold">Admin panel</h1>
        <p class="mt-3 text-slate-700">Hier kun je later de CRUD-pagina's voor reizen, boekingen, gebruikers en recensies toevoegen.</p>

        <div class="mt-8 grid gap-4 md:grid-cols-3">
            <div class="rounded-md border border-slate-200 p-4">
                <h2 class="font-fraunces text-xl font-semibold">Reizen</h2>
                <p class="mt-2 text-sm text-slate-600">Aanmaken, bekijken, aanpassen en verwijderen.</p>
            </div>
            <div class="rounded-md border border-slate-200 p-4">
                <h2 class="font-fraunces text-xl font-semibold">Boekingen</h2>
                <p class="mt-2 text-sm text-slate-600">Overzicht van reserveringen en statussen.</p>
            </div>
            <div class="rounded-md border border-slate-200 p-4">
                <h2 class="font-fraunces text-xl font-semibold">Recensies</h2>
                <p class="mt-2 text-sm text-slate-600">Reviews controleren en beheren.</p>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../../app/includes/footer.php"; ?>
