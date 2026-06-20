document.addEventListener('DOMContentLoaded', function () {
    var menuKnop = document.getElementById('menuKnop');
    var mobielMenu = document.getElementById('mobielMenu');

    if (menuKnop && mobielMenu) {
        menuKnop.addEventListener('click', function () {
            mobielMenu.classList.toggle('hidden');
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
