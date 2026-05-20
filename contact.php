<?php
$pageTitle = "Contact - Qlawie Airlines";
include "header.php";
?>

<main class="px-6 py-12">
    <section class="mx-auto max-w-4xl">
        <p class="text-xs font-bold uppercase tracking-wide text-accent">Contact</p>
        <h1 class="font-fraunces text-4xl font-bold">Stuur ons een bericht</h1>
        <p class="mt-3 text-slate-700">Heb je een vraag over een reis of boeking? Stuur ons dan een bericht.</p>

        <form class="mt-8 grid gap-4 rounded-md border border-slate-200 p-5" action="contact.php" method="post">
            <input class="h-12 rounded-md border border-slate-200 px-3 outline-none focus:border-accent" type="text" name="naam" placeholder="Naam">
            <input class="h-12 rounded-md border border-slate-200 px-3 outline-none focus:border-accent" type="email" name="email" placeholder="E-mail">
            <textarea class="min-h-36 rounded-md border border-slate-200 p-3 outline-none focus:border-accent" name="bericht" placeholder="Bericht"></textarea>
            <button class="h-12 rounded-md bg-accent px-5 text-sm font-bold text-white hover:bg-black" type="submit">Veeersturen</button>
        </form>
    </section>
</main>

<?php include "footer.php"; ?>
