# Testcases Qlawie Airlines

In dit document staan de testen voor onze website.  
We hebben getest of de belangrijkste onderdelen werken.

## Testcase 1: Registreren

Doel:
Controleren of een gebruiker een account kan maken.

Stappen:
1. Ga naar `registreren.php`.
2. Vul voornaam, achternaam, email en wachtwoord in.
3. Klik op registreren.

Verwacht resultaat:
De gebruiker wordt aangemaakt en kan daarna inloggen.

Resultaat:
Gelukt.

## Testcase 2: Inloggen

Doel:
Controleren of een gebruiker kan inloggen.

Stappen:
1. Ga naar `inloggen.php`.
2. Vul email en wachtwoord in.
3. Klik op inloggen.

Verwacht resultaat:
De gebruiker komt op zijn account of op het admin paneel.

Resultaat:
Gelukt.

## Testcase 3: Uitloggen

Doel:
Controleren of een gebruiker kan uitloggen.

Stappen:
1. Log in met een account.
2. Klik op uitloggen.

Verwacht resultaat:
De sessie wordt gestopt en de gebruiker gaat terug naar de website.

Resultaat:
Gelukt.

## Testcase 4: Reizen bekijken

Doel:
Controleren of bezoekers reizen kunnen bekijken.

Stappen:
1. Ga naar `reizen.php`.
2. Bekijk de reizen.
3. Klik op een reis.

Verwacht resultaat:
De gebruiker ziet de informatie van de gekozen reis.

Resultaat:
Gelukt.

## Testcase 5: Vluchten bekijken

Doel:
Controleren of bezoekers losse vluchten kunnen bekijken.

Stappen:
1. Ga naar `vluchten.php`.
2. Bekijk de vluchten.
3. Klik op een vlucht.

Verwacht resultaat:
De gebruiker ziet de informatie van de gekozen vlucht.

Resultaat:
Gelukt.

## Testcase 6: Zoeken naar reizen

Doel:
Controleren of de zoekfunctie werkt.

Stappen:
1. Ga naar de homepagina.
2. Vul een zoekwoord in.
3. Klik op zoeken.

Verwacht resultaat:
De gebruiker komt op de resultatenpagina en ziet passende reizen.

Resultaat:
Gelukt.

## Testcase 7: Reis boeken

Doel:
Controleren of een gebruiker een reis kan boeken.

Stappen:
1. Ga naar `boeken.php`.
2. Kies een reis.
3. Vul naam, email en aantal reizigers in.
4. Klik op boeking afronden.

Verwacht resultaat:
De boeking wordt opgeslagen in de database.

Resultaat:
Gelukt.

## Testcase 8: Vlucht boeken

Doel:
Controleren of een gebruiker een losse vlucht kan boeken.

Stappen:
1. Ga naar `boeken.php`.
2. Kies een vlucht.
3. Vul naam, email en aantal reizigers in.
4. Klik op boeking afronden.

Verwacht resultaat:
De boeking wordt opgeslagen in de database.

Resultaat:
Gelukt.

## Testcase 9: Boeking annuleren

Doel:
Controleren of een ingelogde gebruiker een boeking kan annuleren.

Stappen:
1. Log in.
2. Ga naar `account.php`.
3. Klik bij een boeking op annuleren.

Verwacht resultaat:
De status van de boeking wordt geannuleerd.

Resultaat:
Gelukt.

## Testcase 10: Contactbericht sturen

Doel:
Controleren of een bezoeker een contactbericht kan sturen.

Stappen:
1. Ga naar `contact.php`.
2. Vul naam, email, onderwerp en bericht in.
3. Klik op versturen.

Verwacht resultaat:
Het bericht wordt opgeslagen in de database.

Resultaat:
Gelukt.

## Testcase 11: Recensie plaatsen

Doel:
Controleren of een ingelogde gebruiker een recensie kan plaatsen.

Stappen:
1. Log in.
2. Ga naar `account.php`.
3. Vul een recensie in.
4. Klik op plaatsen.

Verwacht resultaat:
De recensie wordt opgeslagen en wacht op goedkeuring.

Resultaat:
Gelukt.

## Testcase 12: Recensies lezen

Doel:
Controleren of bezoekers recensies kunnen lezen.

Stappen:
1. Ga naar een reispagina.
2. Bekijk de recensies.

Verwacht resultaat:
De recensies worden getoond bij de juiste reis.

Resultaat:
Gelukt.

## Testcase 13: Admin inloggen

Doel:
Controleren of een beheerder in het admin paneel kan komen.

Stappen:
1. Ga naar `inloggen.php`.
2. Log in met een beheerder account.

Verwacht resultaat:
De beheerder komt op het admin dashboard.

Resultaat:
Gelukt.

## Testcase 14: Admin reis toevoegen

Doel:
Controleren of de beheerder een reis kan toevoegen.

Stappen:
1. Log in als beheerder.
2. Ga naar admin reizen.
3. Vul het formulier in.
4. Klik op toevoegen.

Verwacht resultaat:
De nieuwe reis staat in de lijst.

Resultaat:
Gelukt.

## Testcase 15: Admin reis wijzigen

Doel:
Controleren of de beheerder een reis kan wijzigen.

Stappen:
1. Ga naar admin reizen.
2. Klik op bewerken bij een reis.
3. Pas gegevens aan.
4. Klik op wijzigen.

Verwacht resultaat:
De aangepaste gegevens worden opgeslagen.

Resultaat:
Gelukt.

## Testcase 16: Admin reis verwijderen

Doel:
Controleren of de beheerder een reis kan verwijderen.

Stappen:
1. Ga naar admin reizen.
2. Klik op verwijderen bij een reis.

Verwacht resultaat:
De reis wordt verwijderd uit de database.

Resultaat:
Gelukt.

## Testcase 17: Admin vlucht toevoegen

Doel:
Controleren of de beheerder een vlucht kan toevoegen.

Stappen:
1. Ga naar admin vluchten.
2. Vul het formulier in.
3. Klik op toevoegen.

Verwacht resultaat:
De nieuwe vlucht staat in de lijst.

Resultaat:
Gelukt.

## Testcase 18: Admin vlucht wijzigen

Doel:
Controleren of de beheerder een vlucht kan wijzigen.

Stappen:
1. Ga naar admin vluchten.
2. Klik op bewerken bij een vlucht.
3. Pas gegevens aan.
4. Klik op wijzigen.

Verw resultaat:
De aangepaste vlucht wordt opgeslagen.

Resultaat:
Gelukt.

## Testcase 19: Admin vlucht verwijderen

Doel:
Controleren of de beheerder een vlucht kan verwijderen.

Stappen:
1. Ga naar admin vluchten.
2. Klik op verwijderen bij een vlucht.

Verwacht resultaat:
De vlucht wordt verwijderd uit de database.

Resultaat:
Gelukt.

## Testcase 20: Admin boekingstatus aanpassen

Doel:
Controleren of de beheerder een boeking kan aanpassen.

Stappen:
1. Ga naar admin boekingen.
2. Kies een andere status.
3. Klik op opslaan.

Verwacht resultaat:
De status van de boeking wordt aangepast.

Resultaat:
Gelukt.

## Testcase 21: Admin recensie goedkeuren

Doel:
Controleren of de beheerder een recensie kan goedkeuren.

Stappen:
1. Ga naar admin reviews.
2. Klik op goed bij een recensie.

Verwacht resultaat:
De recensie krijgt de status goedgekeurd.

Resultaat:
Gelukt.

## Testcase 22: Admin bericht beheren

Doel:
Controleren of de beheerder contactberichten kan beheren.

Stappen:
1. Ga naar admin berichten.
2. Klik op gelezen, beantwoord of verwijder.

Verwacht resultaat:
De status verandert of het bericht wordt verwijderd.

Resultaat:
Gelukt.

## Testcase 23: Mobiele website

Doel:
Controleren of de website op mobiel werkt.

Stappen:
1. Open de website op een klein scherm.
2. Klik op het menu.
3. Open verschillende pagina's.

Verwacht resultaat:
De website past zich aan en het menu werkt.

Resultaat:
Gelukt.

## Testcase 24: Formulier validatie met JavaScript

Doel:
Controleren of JavaScript een formulier controleert.

Stappen:
1. Ga naar `boeken.php`.
2. Kies geen reis en geen vlucht.
3. Klik op boeking afronden.

Verwacht resultaat:
Er komt een melding dat je een reis of vlucht moet kiezen.

Resultaat:
Gelukt.
