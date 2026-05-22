<?php
$pageTitle = "Zoekresultaten - Qlawie Airlines";
$zoek = $_GET["zoek"] ?? "";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main>
    <section class="bg-slate-50 px-6 py-10">
        <div class="mx-auto max-w-6xl">
            <p class="text-xs font-bold uppercase tracking-wide text-accent">Resultaten</p>
            <h1 class="font-fraunces text-4xl font-bold">Gevonden reizen</h1>
            <p class="mt-3 text-slate-700">Zoekterm: <?php echo htmlspecialchars($zoek ?: "alles"); ?></p>
        </div>
    </section>

    <section class="px-6 py-10">
        <div class="mx-auto max-w-6xl">
            <div class="rounded-md border border-slate-200 p-5">

            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
