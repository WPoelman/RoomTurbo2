# RoomTurbo2
RoomTurbo maar dan in Laravel.

## Achtergrond
Voor het vak 'Database-driven Webtechnology' (Rijksuniversiteit Groningen - Informatiekunde) heb ik met een paar mede-studenten [RoomTurbo](https://github.com/WPoelman/DDWT-Eindopdracht "RoomTurbo Repository") gemaakt, een PHP CRUD applicatie die het kamerprobleem onder studenten in Groningen zou moeten oplossen. Alle vereiste functionaliteit hebben we erin gekregen (user-roles, file upload, messaging, reset password etc.), maar de applicatie had aardig wat ruwe randjes. Deze bleven mij achtervolgen in mijn slaap en daarom heb ik besloten om RoomTurbo2 te maken; dezelfde applicatie, maar dan in Laravel.

### Let op, ik ben niet verantwoordelijk voor veiligheidsproblemen o.i.d. mocht je iets hiervan gebruiken. Dit is alleen een demo om te oefenen en waar nog aan gewerkt wordt!

## Uitproberen
1. Download deze repository
2. Start een MySQL server met bijvoorbeeld MAMP of XAMPP 
3. Import `roomturbo.sql` in die MySQL server met bijvoorbeeld 'PHPmyadmin' of 'Sequel Pro'
4. Gooi alles van deze repository in de `htdocs` map van de lokale host (MAMP, XAMPP etc.) of host het project met `php artisan serve`
5. Ga naar `localhost` in je browser
