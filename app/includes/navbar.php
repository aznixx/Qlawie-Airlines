<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$basePath = $basePath ?? '';

?>
<!DOCTYPE html>
<html lang="nl" class="no-scrollbar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? "Qlawie Airlines"; ?></title>
    <link rel="stylesheet" href="<?php echo $basePath; ?>output.css">
</head>

<body class="bg-white font-sans text-black overflow-y-auto no-scrollbar">
    <nav class="sticky h-16 top-0 z-20 w-full border-b border-accent bg-white shadow-sm">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-2 px-4 py-3 sm:gap-6 sm:px-6">
            <a href="<?php echo $basePath; ?>index.php" aria-label="Qlawie Airlines home">
                <img class="absolute -top-1 h-16 w-20 rounded-md object-cover object-center sm:-top-2 sm:h-24 sm:w-32" src="<?php echo $basePath; ?>assets/logo.png" alt="Qlawie Airlines logo">
            </a>
            <div class="hidden absolute left-1/2 -translate-x-1/2 top-5 items-center gap-6 md:flex">
                <a class="text-sm font-semibold text-black hover:text-accent" href="<?php echo $basePath; ?>index.php">Home</a>
                <a class="text-sm font-semibold text-black hover:text-accent" href="<?php echo $basePath; ?>bestemmingen.php">Bestemmingen</a>
                <a class="text-sm font-semibold text-black hover:text-accent" href="<?php echo $basePath; ?>vluchten.php">Vluchten</a>
                <a class="text-sm font-semibold text-black hover:text-accent" href="<?php echo $basePath; ?>over-ons.php">Over ons</a>
                <a class="text-sm font-semibold text-black hover:text-accent" href="<?php echo $basePath; ?>contact.php">Contact</a>
            </div>

            <div class="flex items-center gap-2 sm:gap-4">
                <?php if (!isset($_SESSION['gebruiker_id'])): ?>
                    <a class="rounded-md bg-accent px-3 py-2 text-xs font-semibold text-white hover:bg-black sm:px-4 sm:text-sm"
                        href="<?php echo $basePath; ?>inloggen.php">Inloggen</a>

                    <a class="rounded-md bg-accent px-3 py-2 text-xs font-semibold text-white hover:bg-black sm:px-4 sm:text-sm"
                        href="<?php echo $basePath; ?>registreren.php">Registreren</a>
                <?php else: ?>
                    <a class="rounded-md bg-accent px-3 py-2 text-xs font-semibold text-white hover:bg-black sm:px-4 sm:text-sm"
                        href="<?php echo $basePath; ?>account.php">Mijn Account</a>

                    <a class="rounded-md bg-accent px-3 py-2 text-xs font-semibold text-white hover:bg-black sm:px-4 sm:text-sm"
                        href="<?php echo $basePath; ?>uitloggen.php">Uitloggen</a>
                <?php endif; ?>
            </div>
    </nav>
