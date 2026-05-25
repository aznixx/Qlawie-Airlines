<?php
$pageTitle = "Zoekresultaten - Qlawie Airlines";

include __DIR__ . "/../app/config/pdo.php";

$zoek = trim($_GET["zoek"] ?? "");

if ($zoek) {
    $stmt = $pdo->prepare("SELECT * FROM bestemmingen WHERE stad LIKE '%$zoek%'");
    $stmt->execute();
    $resultaten = $stmt->fetchAll();
}


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

    <section class="px-6 py-12">
        <div class="mx-auto max-w-6xl">
            <div class="mt-6 grid gap-5 md:grid-cols-3">
                <?php foreach ($resultaten as $bestemming) { ?>
                <article class="overflow-hidden rounded-md border border-slate-200 bg-white">
                    <img class="h-40 w-full object-cover" src="<?= htmlspecialchars($bestemming['afbeelding']) ?>" alt="">
                    <div class="p-5">
                        <p class="text-sm font-bold text-accent"><?= htmlspecialchars($bestemming['aantal_dagen']) ?> dagen</p>
                        <h2 class="font-fraunces text-2xl font-semibold"><?= htmlspecialchars($bestemming["naam"]) ?></h2>
                        <p class="mt-2 text-sm text-slate-600"><?= htmlspecialchars($bestemming['korte_beschrijving']) ?></p>
                        <p class="mt-4 font-bold text-accent">€<?= htmlspecialchars($bestemming['prijs_reis']) ?></p>
                        <a class="mt-4 inline-block rounded-md bg-accent px-4 py-2 text-sm font-bold text-white hover:bg-black" href="boeken.php">Boeken</a>
                    </div>
                </article>
                <?php } ?>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>