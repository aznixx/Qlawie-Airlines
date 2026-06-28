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
            retourKnop.className = 'knop';
            enkelKnop.className = 'knop-lijn';
        });

        enkelKnop.addEventListener('click', function () {
            reisType.value = 'enkel';
            terugVeld.classList.add('hidden');
            enkelKnop.className = 'knop';
            retourKnop.className = 'knop-lijn';
        });
    }

    var boekForm = document.getElementById('boekForm');

    if (boekForm) {
        boekForm.addEventListener('submit', function (event) {
            var reis = boekForm.querySelector('select[name="reis_id"]');
            var vlucht = boekForm.querySelector('select[name="vlucht_id"]');

            if (reis.value == '' && vlucht.value == '') {
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

    var tekstVelden = document.querySelectorAll('textarea');

    tekstVelden.forEach(function (tekstVeld) {
        var teller = document.createElement('p');
        teller.className = 'tekst-teller';
        teller.innerText = '0 tekens';

        tekstVeld.parentNode.appendChild(teller);

        tekstVeld.addEventListener('input', function () {
            teller.innerText = tekstVeld.value.length + ' tekens';
        });
    });

    var reisklasse = document.querySelector('select[name="reisklasse"]');

    if (reisklasse) {
        var opgeslagenReisklasse = localStorage.getItem('reisklasse');

        if (opgeslagenReisklasse) {
            reisklasse.value = opgeslagenReisklasse;
        }

        reisklasse.addEventListener('change', function () {
            localStorage.setItem('reisklasse', reisklasse.value);
        });
    }
});
