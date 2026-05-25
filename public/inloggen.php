<?php
session_start();

if (isset($_SESSION['gebruiker_id'])) {
    header("Location: index.php");
    exit;
}

$pageTitle = "Inloggen - Qlawie Airlines";
include __DIR__ . '/../app/config/pdo.php';

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $wachtwoord = trim($_POST['wachtwoord']);

    $stmt = $pdo->prepare("SELECT * FROM gebruikers WHERE email = '$email'");
    $stmt->execute();
    $gebruiker = $stmt->fetch();

    if ($gebruiker && password_verify($wachtwoord, $gebruiker['wachtwoord_hash'])) {
        $_SESSION['gebruiker_id'] = $gebruiker['id'];
        $_SESSION['rol'] = $gebruiker['rol'];

        header("Location: index.php");
        exit;
    } else {
        $error = "E-mail of wachtwoord is fout.";
    }
}


include __DIR__ . "/../app/includes/navbar.php";
?>

<main class="px-6 py-12">
    <section class="mx-auto max-w-xl">
        <p class="text-xs font-bold uppercase tracking-wide text-accent">Account</p>
        <h1 class="font-fraunces text-4xl font-bold">Inloggen</h1>
        <p class="mt-3 text-slate-700">Log in om je persoonlijke gegevens en geboekte reizen te bekijken.</p>

        <form class="mt-8 grid gap-4 rounded-md border border-slate-200 p-5" action="inloggen.php" method="post">
            <label class="grid gap-1">
                <span class="text-sm font-semibold">E-mail</span>
                <input class="h-12 rounded-md border border-slate-200 px-3 outline-none focus:border-accent" type="email" name="email" autocomplete="email" required>
            </label>

            <label class="grid gap-1">
                <span class="text-sm font-semibold">Wachtwoord</span>
                <input class="h-12 rounded-md border border-slate-200 px-3 outline-none focus:border-accent" type="password" name="wachtwoord" required>
            </label>

            <button class="h-12 rounded-md bg-accent px-5 text-sm font-bold text-white hover:bg-black" type="submit">Inloggen</button>
        </form>

        <p class="mt-5 text-sm text-slate-600">
            Nog geen account?
            <a class="font-bold text-accent hover:text-black" href="registreren.php">Maak een account aan</a>
        </p>

        <?php if ($error): ?>
            <div class="mt-5 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-700">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>
