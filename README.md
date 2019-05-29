# RoomTurbo2
RoomTurbo maar dan in Laravel.

## Achtergrond
Voor het vak 'Database-driven Webtechnology' (Rijksuniversiteit Groningen - Informatiekunde) heb ik met een paar mede-studenten [RoomTurbo](https://github.com/WPoelman/DDWT-Eindopdracht "RoomTurbo Repository") gemaakt, een PHP CRUD applicatie die het kamerprobleem onder studenten in Groningen zou moeten oplossen. Alle vereiste functionaliteit hebben we erin gekregen (user-roles, file upload, messaging, reset password etc.), maar de applicatie had aardig wat ruwe randjes. Deze bleven mij achtervolgen in mijn slaap en daarom heb ik besloten om RoomTurbo2 te maken; dezelfde applicatie, maar dan opgeschoond, verbeterd en uitgebreid in Laravel.

### Let op, ik ben niet verantwoordelijk voor veiligheidsproblemen o.i.d. mocht je iets hiervan gebruiken. Dit is alleen een demo om te oefenen en waar nog aan gewerkt wordt!

## Uitproberen 
(ik ga er vanuit dat je [Laravel](https://laravel.com/docs/5.8/installation) geïnstalleerd hebt)
1. Download deze repository
2. Start een MySQL server met bijvoorbeeld MAMP of XAMPP, maak een database en zorg dat je `.env` deze database kan zien
3. Seed de database met `php artisan migrate:refresh --seed` (hoeft niet, maar dan is er wat te zien)
4. Gooi alles van deze repository in de `htdocs` map van de lokale host (MAMP, XAMPP etc.) of host het project met `php artisan serve`
5. Ga naar `localhost:8000` (meestal) in je browser

## TO DO
#### Prioriteit
* Profielpagina die public is en waar je de kamers van die specifieke verhuurder kunt zien.
* Kunnen reageren op een kamer als een huurder en die berichten zien op het dashboard.
*  <strike>Afbeeldingen kunnen uploaden / aanpassen / verwijderen</strike>(placeholder maken).
* Client-side input validatie (jQuery) + errors.
* API toevoegen waarmee informatie over de kamers opgehaald kan worden.

#### Eventueel
* Styling verbeteren.
* Zoekfunctie toevoegen.
* Errors en messages vertalen van ENG->NL (zijn nu standaard uit Laravel in het Engels).
* Nuttige footer / sidebar toevoegen.
