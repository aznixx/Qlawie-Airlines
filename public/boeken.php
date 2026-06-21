<?php
include __DIR__ . "/../app/page-includes/laden/laad-boekformulier.php";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main class="px-6 py-12">
    <section class="mx-auto max-w-4xl">
        <p class="text-xs font-bold uppercase text-accent">Boeken</p>
        <h1 class="font-fraunces text-4xl font-bold">Boeking maken</h1>
        <p class="mt-3 text-black">Kies een reis of losse vlucht en vul je gegevens in.</p>

        <?php if ($foutmelding !== '') { ?>
            <p class="mt-5 rounded-md border border-black p-4 text-sm font-bold text-accent"><?= $foutmelding ?></p>
        <?php } ?>

        <form id="boekForm" class="mt-8 grid gap-4 rounded-md border border-black p-5 md:grid-cols-2" action="../app/page-includes/verwerken/verwerk-boeking.php" method="post">
            <label class="grid gap-1">
                <span class="text-sm font-semibold">Pakketreis</span>
                <select class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" name="reis_id">
                    <option value="">Geen pakketreis</option>
                    <?php foreach ($reizen as $reis) { ?>
                        <option value="<?= $reis['id'] ?>" <?= $reis_id == $reis['id'] ? 'selected' : '' ?>><?= $reis['titel'] ?></option>
                    <?php } ?>
                </select>
            </label>

            <label class="grid gap-1">
                <span class="text-sm font-semibold">Losse vlucht</span>
                <select class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" name="vlucht_id">
                    <option value="">Geen losse vlucht</option>
                    <?php foreach ($vluchten as $vlucht) { ?>
                        <option value="<?= $vlucht['id'] ?>" <?= $vlucht_id == $vlucht['id'] ? 'selected' : '' ?>><?= $vlucht['vlucht_nummer'] ?> - <?= $vlucht['aankomst_luchthaven'] ?></option>
                    <?php } ?>
                </select>
            </label>

            <label class="grid gap-1">
                <span class="text-sm font-semibold">Naam</span>
                <input class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" name="naam" value="<?= $gebruiker ? $gebruiker['voornaam'] : '' ?>" required>
            </label>

            <label class="grid gap-1">
                <span class="text-sm font-semibold">E-mail</span>
                <input class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" type="email" value="<?= $gebruiker ? $gebruiker['email'] : '' ?>" name="email" required>
            </label>

            <label class="grid gap-1">
                <span class="text-sm font-semibold">Telefoon</span>
                <input class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" value="<?= $gebruiker ? $gebruiker['telefoon'] : '' ?>" name="telefoon">
            </label>

            <label class="grid gap-1">
                <span class="text-sm font-semibold">Aantal reizigers</span>
                <select class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" name="reizigers">
                    <option value="1">1 reiziger</option>
                    <option value="2">2 reizigers</option>
                    <option value="3">3 reizigers</option>
                    <option value="4">4 reizigers</option>
                </select>
            </label>

            <label class="grid gap-1">
                <span class="text-sm font-semibold">Reisklasse</span>
                <select class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" name="reisklasse">
                    <option>Economy</option>
                    <option>Premium Economy</option>
                    <option>Business</option>
                </select>
            </label>

            <label class="grid gap-1">
                <span class="text-sm font-semibold">Bagage</span>
                <select class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" name="bagage">
                    <option>Handbagage</option>
                    <option>Ruimbagage</option>
                    <option>Extra bagage</option>
                </select>
            </label>

            <label class="grid gap-1 md:col-span-2">
                <span class="text-sm font-semibold">Opmerkingen</span>
                <textarea class="min-h-28 rounded-md border border-black p-3 outline-none focus:border-accent" name="opmerkingen"></textarea>
            </label>

            <button class="h-12 rounded-md bg-accent px-5 text-sm font-bold text-white hover:bg-black md:col-span-2" type="submit">Boeking afronden</button>
        </form>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
