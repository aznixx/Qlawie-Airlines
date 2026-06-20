<?php
$slug = "privacy-policy";
$titel = "Privacy policy";
include __DIR__ . "/../app/page-includes/haal-site-pagina-op.php";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main class="px-6 py-12">
    <section class="mx-auto max-w-4xl rounded-md border border-black bg-white p-5">
        <p class="text-xs font-bold uppercase text-accent">Qlawie Airlines</p>
        <h1 class="mt-2 font-fraunces text-4xl font-bold"><?= $pagina ? $pagina['titel'] : 'Privacy policy' ?></h1>

        <?php if ($pagina) { ?>
            <p class="mt-5 whitespace-pre-line text-black"><?= $pagina['inhoud'] ?></p>
        <?php } else { ?>
            <div class="mt-5 grid gap-4 text-black">
                <p>Wij gebruiken je gegevens alleen voor je account, boeking en contact met Qlawie Airlines.</p>
                <p>Je naam, e-mail en telefoonnummer worden opgeslagen zodat wij je boeking kunnen verwerken.</p>
                <p>Wij verkopen je gegevens niet aan andere bedrijven.</p>
                <p>Wil je je gegevens aanpassen of verwijderen? Neem dan contact met ons op via de contactpagina.</p>
            </div>
        <?php } ?>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
