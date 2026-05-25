<?php
$pageTitle = "Bestemmingen - Qlawie Airlines";
include __DIR__ . "/../app/includes/navbar.php";
include __DIR__ . "/../app/config/pdo.php";

$stmt = $pdo->query('SELECT * FROM bestemmingen');
$bestemmingen = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main>
    <section class="bg-slate-50 px-6 py-10">
        <div class="mx-auto max-w-6xl">
            <p class="text-xs font-bold uppercase tracking-wide text-accent">Bestemmingen</p>
            <h1 class="font-fraunces text-4xl font-bold">Populaire reizen</h1>
            <p class="mt-3 max-w-2xl text-slate-700">Bekijk locaties en kies een reis die bij je past.</p>

            <form class="mt-6 grid gap-3 rounded-md bg-white p-4 md:grid-cols-4" action="resultaten.php" method="get">
                <input class="h-12 rounded-md border border-slate-200 px-3 text-sm outline-none focus:border-accent md:col-span-3" type="text" name="zoek" placeholder="Zoek op bestemming">
                <button class="h-12 rounded-md bg-accent px-5 text-sm font-bold text-white hover:bg-black" type="submit">Zoeken</button>
            </form>
        </div>
    </section>

    <section class="px-6 py-10">
        <div class="mx-auto max-w-6xl">
            <div class="mt-8 grid gap-5 md:grid-cols-3">
                <?php foreach ($bestemmingen as $bestemming) { ?>
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