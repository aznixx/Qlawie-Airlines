<?php include __DIR__ . "/../app/page-includes/verwerk-contactformulier.php"; ?>

<main class="px-6 py-12">
    <section class="mx-auto max-w-4xl">
        <p class="text-xs font-bold uppercase text-accent">Contact</p>
        <h1 class="font-fraunces text-4xl font-bold">Stuur ons een bericht</h1>
        <p class="mt-3 text-black">Heb je een vraag over een reis of boeking? Stuur ons dan een bericht.</p>

        <form class="mt-8 grid gap-4 rounded-md border border-black p-5" action="contact.php" method="post">
            <input class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" name="naam" value="<?= htmlspecialchars($naam ?? '') ?>" placeholder="Naam">
            <input class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" type="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" placeholder="E-mail">
            <textarea class="min-h-36 rounded-md border border-black p-3 outline-none focus:border-accent" name="bericht" value="<?= htmlspecialchars($bericht ?? '') ?>" placeholder="Bericht"></textarea>
            <button class="h-12 rounded-md bg-accent px-5 text-sm font-bold text-white hover:bg-black" type="submit">Versturen</button>
        </form>

        
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
