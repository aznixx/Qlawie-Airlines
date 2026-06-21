<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="nl" class="no-scrollbar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? "Qlawie Airlines"; ?></title>
    <link rel="stylesheet" href="/public/output.css">
</head>

<body class="bg-white font-sans text-black overflow-y-auto no-scrollbar">

    <nav class="sticky top-0 z-20 w-full border-b border-accent bg-white shadow-sm">
        <div class="mx-auto max-w-7xl px-4 sm:px-6">

            <div class="relative h-16">

                <a href="/public/index.php"
                    aria-label="Qlawie Airlines home"
                    class="absolute left-0 top-10 -translate-y-1/2">

                    <img
                        class="h-24 w-24 rounded-md object-cover object-center"
                        src="/public/assets/logo.png"
                        alt="Qlawie Airlines logo">
                </a>

                <div class="absolute left-1/2 top-1/2 hidden -translate-x-1/2 -translate-y-1/2 items-center gap-6 md:flex">
                    <a class="text-sm font-semibold text-black hover:text-accent" href="/public/index.php">Home</a>
                    <a class="text-sm font-semibold text-black hover:text-accent" href="/public/reizen.php">Reizen</a>
                    <a class="text-sm font-semibold text-black hover:text-accent" href="/public/vluchten.php">Vluchten</a>
                    <a class="text-sm font-semibold text-black hover:text-accent" href="/public/over-ons.php">Over ons</a>
                    <a class="text-sm font-semibold text-black hover:text-accent" href="/public/contact.php">Contact</a>
                </div>
                <div class="absolute right-0 top-1/2 flex -translate-y-1/2 items-center gap-2 sm:gap-4">

                    <?php if (!isset($_SESSION['gebruiker_id'])) { ?>

                        <a class="rounded-md bg-accent px-3 py-2 text-xs font-semibold text-white hover:bg-black sm:px-4 sm:text-sm"
                            href="/public/inloggen.php">
                            Inloggen
                        </a>

                        <a class="rounded-md bg-accent px-3 py-2 text-xs font-semibold text-white hover:bg-black sm:px-4 sm:text-sm"
                            href="/public/registreren.php">
                            Registreren
                        </a>

                    <?php } else { ?>

                        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'beheerder') { ?>

                            <a class="rounded-md bg-black px-3 py-2 text-xs font-semibold text-white hover:bg-accent sm:px-4 sm:text-sm"
                                href="/public/admin/admin_dashboard.php">
                                Admin
                            </a>

                        <?php } ?>

                        <a class="rounded-md bg-accent px-3 py-2 text-xs font-semibold text-white hover:bg-black sm:px-4 sm:text-sm"
                            href="/public/account.php">
                            Mijn Account
                        </a>

                        <a class="rounded-md bg-accent px-3 py-2 text-xs font-semibold text-white hover:bg-black sm:px-4 sm:text-sm"
                            href="/public/uitloggen.php">
                            Uitloggen
                        </a>

                    <?php } ?>

                    <button id="menuKnop"
                        class="rounded-md border border-black px-3 py-2 text-xs font-bold md:hidden"
                        type="button">
                        Menu
                    </button>

                </div>

            </div>

            <!-- mobiele menu -->
            <div id="mobielMenu" class="hidden border-t border-black py-3 md:hidden">
                <div class="grid gap-2 text-sm font-semibold">
                    <a class="rounded-md px-3 py-2 hover:bg-[#f6f4ef] hover:text-accent" href="/public/index.php">Home</a>
                    <a class="rounded-md px-3 py-2 hover:bg-[#f6f4ef] hover:text-accent" href="/public/reizen.php">Reizen</a>
                    <a class="rounded-md px-3 py-2 hover:bg-[#f6f4ef] hover:text-accent" href="/public/vluchten.php">Vluchten</a>
                    <a class="rounded-md px-3 py-2 hover:bg-[#f6f4ef] hover:text-accent" href="/public/over-ons.php">Over ons</a>
                    <a class="rounded-md px-3 py-2 hover:bg-[#f6f4ef] hover:text-accent" href="/public/contact.php">Contact</a>
                </div>
            </div>

        </div>
    </nav>
