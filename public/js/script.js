document.addEventListener('DOMContentLoaded', function () {
    var menuKnop = document.getElementById('menuKnop');
    var mobielMenu = document.getElementById('mobielMenu');

    if (menuKnop && mobielMenu) {
        menuKnop.addEventListener('click', function () {
            mobielMenu.classList.toggle('hidden');
        });
    }

    var retourKnop = document.getElementById('retourKnop');
    var enkelKnop = document.getElementById('enkelKnop');
    var terugVeld = document.getElementById('terugVeld');
    var reisType = document.getElementById('reisType');

    if (retourKnop && enkelKnop && terugVeld && reisType) {
        retourKnop.addEventListener('click', function () {
            reisType.value = 'retour';
            terugVeld.classList.remove('hidden');
            retourKnop.className = 'rounded-md bg-accent px-4 py-2 text-white';
            enkelKnop.className = 'rounded-md border border-black px-4 py-2 text-black hover:border-accent hover:text-accent';
        });

        enkelKnop.addEventListener('click', function () {
            reisType.value = 'enkel';
            terugVeld.classList.add('hidden');
            enkelKnop.className = 'rounded-md bg-accent px-4 py-2 text-white';
            retourKnop.className = 'rounded-md border border-black px-4 py-2 text-black hover:border-accent hover:text-accent';
        });
    }

    var boekForm = document.getElementById('boekForm');

    if (boekForm) {
        boekForm.addEventListener('submit', function (event) {
            var reis = boekForm.querySelector('select[name="reis_id"]');
            var vlucht = boekForm.querySelector('select[name="vlucht_id"]');

            if (reis.value === '' && vlucht.value === '') {
                alert('Kies een reis of vlucht.');
                event.preventDefault();
            }

            if (reis.value !== '' && vlucht.value !== '') {
                alert('Kies een reis of een vlucht, niet allebei.');
                event.preventDefault();
            }
        });
    }

    var wachtwoordFormen = document.querySelectorAll('.wachtwoordForm');

    wachtwoordFormen.forEach(function (form) {
        form.addEventListener('submit', function (event) {
            var wachtwoord = form.querySelector('input[name="wachtwoord"]');
            var wachtwoordHerhalen = form.querySelector('input[name="wachtwoord_herhalen"]');

            if (wachtwoord && wachtwoordHerhalen && wachtwoord.value !== wachtwoordHerhalen.value) {
                alert('Wachtwoorden komen niet overeen.');
                event.preventDefault();
            }
        });
    });
});
