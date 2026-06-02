<?php
include __DIR__ . "/../app/page-includes/verwerk-inloggen.php"; 

include __DIR__ . "/../app/includes/navbar.php";
?>

<main class="px-6 py-12">
    <section class="mx-auto max-w-xl">
        <p class="text-xs font-bold uppercase text-accent">Account</p>
        <h1 class="font-fraunces text-4xl font-bold">Inloggen</h1>
        <p class="mt-3 text-black">Log in om je persoonlijke gegevens en geboekte reizen te bekijken.</p>

        <form class="mt-8 grid gap-4 rounded-md border border-black p-5" action="inloggen.php" method="post">
            <label class="grid gap-1">
                <span class="text-sm font-semibold">E-mail</span>
                <input class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" type="email" name="email" autocomplete="email" required>
            </label>

            <label class="grid gap-1">
                <span class="text-sm font-semibold">Wachtwoord</span>
                <input class="h-12 rounded-md border border-black px-3 outline-none focus:border-accent" type="password" name="wachtwoord" required>
            </label>

            <button class="h-12 rounded-md bg-accent px-5 text-sm font-bold text-white hover:bg-black" type="submit" name="login">Inloggen</button>
        </form>

        <p class="mt-5 text-sm text-black">
            Nog geen account?
            <a class="font-bold text-accent hover:text-black" href="registreren.php">Maak een account aan</a>
        </p>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>