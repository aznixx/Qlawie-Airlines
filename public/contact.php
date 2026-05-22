<?php
ob_start();
$pageTitle = "Contact - Qlawie Airlines";
include __DIR__ . "/../app/includes/navbar.php";
include __DIR__ . "/../app/config/pdo.php";

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = trim($_POST['naam' ?? '']);
    $email = trim($_POST['email' ?? '']);
    $bericht = trim($_POST['bericht' ?? '']);

    if (empty($naam)) $errors[] = "Naam is verplicht!";
    if (empty($email)) $errors[] = "Email is verplicht!";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Ongeldige email!";
    if (empty($bericht)) $errors[] = "Bericht is verplicht!";


    if (empty($errors)) {
        $stmt = $pdo->prepare('INSERT INTO contact_berichten (naam, email, bericht) VALUES (?, ?, ?)');
        $stmt->execute([$naam, $email, $bericht]);

        header('Location: success_message.php');
        exit;
    }
}

?>

<main class="px-6 py-12">
    <section class="mx-auto max-w-4xl">
        <p class="text-xs font-bold uppercase tracking-wide text-accent">Contact</p>
        <h1 class="font-fraunces text-4xl font-bold">Stuur ons een bericht</h1>
        <p class="mt-3 text-slate-700">Heb je een vraag over een reis of boeking? Stuur ons dan een bericht.</p>

        <form class="mt-8 grid gap-4 rounded-md border border-slate-200 p-5" action="contact.php" method="post">
            <input class="h-12 rounded-md border border-slate-200 px-3 outline-none focus:border-accent" type="text" name="naam" value="<?= htmlspecialchars($naam ?? '') ?>" placeholder="Naam">
            <input class="h-12 rounded-md border border-slate-200 px-3 outline-none focus:border-accent" type="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" placeholder="E-mail">
            <textarea class="min-h-36 rounded-md border border-slate-200 p-3 outline-none focus:border-accent" name="bericht" value="<?= htmlspecialchars($bericht ?? '') ?>" placeholder="Bericht"></textarea>
            <button class="h-12 rounded-md bg-accent px-5 text-sm font-bold text-white hover:bg-black" type="submit">Versturen</button>
        </form>

        
    </section>
</main>

<?php include __DIR__ . "/../app/includes/footer.php"; ?>