<?php
$slug = "algemene-voorwaarden";
$titel = "Algemene voorwaarden";
include __DIR__ . "/../app/page-includes/haal-site-pagina-op.php";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main class="px-6 py-12">
    <section class="mx-auto max-w-4xl rounded-md border border-black bg-white p-5">
        <p class="text-xs font-bold uppercase text-accent">Qlawie Airlines</p>
        <h1 class="mt-2 font-fraunces text-4xl font-bold"><?= $pagina ? $pagina['titel'] : 'Algemene voorwaarden' ?></h1>

        <?php if ($pagina) { ?>
            <p class="mt-5 whitespace-pre-line text-black"><?= $pagina['inhoud'] ?></p>
        <?php } else { ?>
            <div class="mt-5 grid gap-4 text-black">
                <p>Een boeking is pas definitief wanneer Qlawie Airlines deze heeft bevestigd.</p>
                <p>Prijzen kunnen veranderen zolang een boeking nog niet bevestigd is.</p>
                <p>Annuleren kan via je account zolang de boeking nog niet is afgerond.</p>
                <p>Bij vragen kun je altijd contact opnemen via de contactpagina.</p>
            </div>
        <?php } ?>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
