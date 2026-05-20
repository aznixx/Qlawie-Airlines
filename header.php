<!DOCTYPE html>
<html lang="nl" class="no-scrollbar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? "Qlawie Airlines"; ?></title>
    <link rel="stylesheet" href="public/output.css">
</head>

<body class="bg-white font-sans text-slate-950 overflow-y-auto no-scrollbar">
    <nav class="sticky top-0 z-20 w-full border-b border-accent bg-white shadow-sm">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-6 py-3">
            <a href="index.php" aria-label="Qlawie Airlines home">
                <img class="h-24 absolute -top-2 w-32 rounded-md object-cover object-center" src="assets/logo.png">
            </a>

            <div class="hidden items-center gap-6 md:flex">
                <a class="text-sm font-semibold text-black hover:text-accent" href="index.php">Home</a>
                <a class="text-sm font-semibold text-black hover:text-accent" href="bestemmingen.php">Bestemmingen</a>
                <a class="text-sm font-semibold text-black hover:text-accent" href="over-ons.php">Over ons</a>
                <a class="text-sm font-semibold text-black hover:text-accent" href="contact.php">Contact</a>
            </div>

            <div class="flex items-center gap-4">
                <a class="rounded-md bg-accent px-4 py-2 text-sm font-semibold text-white hover:bg-black"
                    href="bestemmingen.php">Bekijk reizen</a>
            </div>
        </div>
    </nav>
