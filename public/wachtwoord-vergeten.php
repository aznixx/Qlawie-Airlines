<?php
include __DIR__ . "/../app/page-includes/laad-wachtwoord-vergeten.php";
include __DIR__ . "/../app/includes/navbar.php";
?>

<main class="px-6 py-12">
    <section class="mx-auto max-w-xl">
        <p class="text-xs font-bold uppercase text-accent">Account</p>
        <h1 class="font-fraunces text-4xl font-bold">Wachtwoord vergeten</h1>
        <p class="mt-3 text-black">Vul je e-mail in om je wachtwoord te resetten.</p>

        <?php if ($melding !== '') { ?>
            <p class="mt-5 rounded-md border border-black p-4 text-sm font-bold text-accent"><?= $melding ?></p>
        <?php } ?>

        <?php if ($reset_link !== '') { ?>
            <a class="mt-5 inline-flex rounded-md bg-accent px-5 py-3 text-sm font-bold text-white hover:bg-black" href="<?= $reset_link ?>">Reset wachtwoord</a>
        <?php } ?>

        <form class="mt-8 grid gap-4 rounded-md border border-black p-5" action="../app/page-includes/verwerk-wachtwoord-vergeten.php" method="post">
            <label class="grid gap-1">
                <span class="text-sm font-semibold">E-mail</span>
                <input class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" type="email" name="email" required>
            </label>

            <button class="h-12 rounded-md bg-accent px-5 text-sm font-bold text-white hover:bg-black" type="submit">Reset aanvragen</button>
        </form>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
