<?php
include __DIR__ . "/../app/includes/navbar.php";

$foutmelding = $_SESSION['foutmelding'] ?? '';
unset($_SESSION['foutmelding']);

?>

<main class="px-6 py-12">
    <section class="mx-auto max-w-3xl">
        <p class="text-xs font-bold uppercase text-accent">Account</p>
        <h1 class="font-fraunces text-4xl font-bold">Account aanmaken</h1>
        <p class="mt-3 text-black">Maak een account aan om je gegevens en reizen later makkelijk te beheren.</p>

        <?php if (($foutmelding ?? '') !== '') {?>
            <p class="mt-5 rounded-md border border-red-600 px-4 py-3 text-sm font-semibold text-red-600">
                <?= $foutmelding ?>
            </p>
        <?php } ?>

        <form class="wachtwoordForm mt-8 grid gap-4 rounded-md border border-black p-5 md:grid-cols-2" action="../app/page-includes/verwerk-registratie.php" method="post">
            <label class="grid gap-1">
                <span class="text-sm font-semibold">Voornaam</span>
                <input class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" name="voornaam" autocomplete="given-name" placeholder="Voornaam.." required>
            </label>

            <label class="grid gap-1">
                <span class="text-sm font-semibold">Achternaam</span>
                <input class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" type="text" name="achternaam" autocomplete="family-name" placeholder="Achternaam.." required>
            </label>

            <label class="grid gap-1">
                <span class="text-sm font-semibold">E-mail</span>
                <input class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" type="email" name="email" autocomplete="email" placeholder="example@mail.com.." required>
            </label>

            <label class="grid gap-1">
                <span class="text-sm font-semibold">Telefoon</span>
                <input class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" type="tel" name="telefoon" autocomplete="tel" placeholder="0612345678..">
            </label>

            <label class="grid gap-1">
                <span class="text-sm font-semibold">Wachtwoord</span>
                <input class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" type="password" name="wachtwoord" autocomplete="new-password" required>
            </label>

            <label class="grid gap-1">
                <span class="text-sm font-semibold">Herhaal wachtwoord</span>
                <input class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" type="password" name="wachtwoord_herhalen" autocomplete="new-password" required>
            </label>

            <button class="h-12 rounded-md bg-accent px-5 text-sm font-bold text-white hover:bg-black md:col-span-2" type="submit">Account aanmaken</button>
        </form>

        <p class="mt-5 text-sm text-black">
            Heb je al een account?
            <a class="font-bold text-accent hover:text-black" href="inloggen.php">Log hier in</a>
        </p>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
