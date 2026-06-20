    <footer class="border-t border-black bg-white px-6 py-10">
        <div class="mx-auto grid max-w-7xl gap-8 text-sm text-black md:grid-cols-4">
            <div class="md:col-span-2">
                <p class="text-xs font-bold uppercase text-accent">Qlawie Airlines</p>
                <h2 class="mt-2 font-fraunces text-3xl font-bold">Reis stijlvol.</h2>
                <p class="mt-3 max-w-xl text-sm text-black">
                    Zoek bestemmingen, bekijk populaire reizen en boek makkelijk je volgende vakantie.
                </p>
            </div>

            <div>
                <p class="text-xs font-bold uppercase text-accent">Pagina's</p>
                <div class="mt-3 grid gap-2">
                    <a class="hover:text-accent" href="<?php echo $basePath ?? ''; ?>index.php">Home</a>
                    <a class="hover:text-accent" href="<?php echo $basePath ?? ''; ?>bestemmingen.php">Bestemmingen</a>
                    <a class="hover:text-accent" href="<?php echo $basePath ?? ''; ?>over-ons.php">Over ons</a>
                    <a class="hover:text-accent" href="<?php echo $basePath ?? ''; ?>contact.php">Contact</a>
                </div>
            </div>

            <div>
                <p class="text-xs font-bold uppercase text-accent">Contact</p>
                <div class="mt-3 grid gap-2">
                    <p>Vragen over een reis?</p>
                    <a class="font-bold text-accent hover:text-black" href="<?php echo $basePath ?? ''; ?>contact.php">Stuur een bericht</a>
                    <a class="font-bold text-accent hover:text-black" href="<?php echo $basePath ?? ''; ?>boeken.php">Boek een reis</a>
                </div>
            </div>
        </div>

        <div class="mx-auto mt-8 flex max-w-7xl flex-col gap-2 border-t border-black pt-5 text-xs text-black md:flex-row md:items-center md:justify-between">
            <p>&copy; Qlawie Airlines.</p>
            <p>Reizen zoeken en boeken.</p>
        </div>
    </footer>
</body>

</html>
