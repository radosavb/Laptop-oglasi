# Laptop oglasi
Projekat u okviru IT obuke na Matf.

# Link
https://laptopdrom.000webhostapp.com/index.php

# Autori
+ Radosav Božović
+ Miloš Sofronijević
+ Boško Milovanović

Internet sajt “Laptopdrom“ je namenjen objavljivanju i pretrazi oglasa polovnih laptop računara.

Sajt ima bazu sa dve tabele. U jednoj su smešteni korisnici koji se registruju preko formulara (link ka njemu je dugme na navbaru), a u drugoj tabeli su smešteni oglasi laptopova koje korisnici objavljuju. Samo registrovani korisnici koji se prijave mogu da objave oglas. Id usera, id oglasa, kao i datum registracije i objave oglasa se automatski upisuju u tabele.

Nakon registracije, korisnik može da se prijavi koristeći svoju e-mail adresu i lozinku koje je uneo prilikom registracije. U slučaju zaboravljene lozinke korisnik može da zahteva novu, koja mu se šalje na e-mail adresu i automatski unosi u bazu umesto zaboravljene (nasumično generisana niska od 10 karaktera).

Nakon uspešne prijave, korisniku se otvara mogućnost da objavljuje oglase i dobija pristup svojoj profilnoj stranici. Na profilnoj stranici korisnik ima mogućnost da pregleda i menja svoje lične podatke i elemente oglasa koji je postavio, kao i da obriše oglas.

Na početnoj strani web sajta je prikaz laptop oglasa, od najnovijeg ka najstarijem. Prikaz je urađen u Bootstrap karticama. Urađen je i pagination (trenutno se prikazuju samo 5 oglasa po stranici). Klikom na dugme kartice “detalji“, otvara se stranica za prikaz pojedinačnog oglasa i informacija o korisniku koji je objavio oglas.

Na početnoj strani levo, nalazi se sidebar sa filterima za naprednu pretragu (po nazivu, ceni i karakteristikama laptopa). Pretraga se pokreće klikom na jedno od dva dugmeta (pretraga po nazivu ima svoje posebno dugme). Uneti kriterijumi mogu da se obrišu klikom na dugme “Resetuj pretragu“.

Na početnoj strani desno je dugme za objavu oglasa. Ukoliko korisnik nije prijavljen, klikom na dugme ponudiće mu se opcija da se prijavi ili registruje. Ukoliko je prijavljen, redirektuje se na stranicu za unos oglasa. Ona sadrži obavezna i opciona polja (više vrsta inputa). Unos se sanitizuje i ako prodje validaciju oglas se upisuje u bazu. Moguć je upload jedne slike određenih formata.

Pošto je u pitanju sajt koji je napravljen kao deo obuke, većina linkova ka stranicama u okviru sajta, kao i onih prema društvenim mrežama je trenutno dekorativna.


# REST API

| Putanja  | Metod | Tip  | Opis |
| ------------- | ------------- | ------------- |------------- |
| /api/oglasi/read  | GET  | JSON  |  Čitanje svih oglasa  |
| /api/oglasi/id/{id}  | GET  | JSON  | Čitanje jednog oglasa sa {id}|
| /api/oglasi/create  | POST  | JSON  | Kreiranje oglasa  |
| /api/oglasi/update  | PUT  | JSON  | Izmena oglasa  |
| /api/korisnici/create  | POST  | JSON  | Kreiranje korisnika  |
| /api/oglasi/login  | POST  | JSON  | Prijava korisnika i dodeljivanje JWT tokena |
| /api/oglasi/validate_token  | POST  | JSON  | Validacija JWT tokena, kao odgovor dobijaju se podaci o korisniku |

### /assets/js
+ login.js - funkcije za logovanje korisnika i upisivanje JWT tokena u cookie , povezuje se sa api/korisnici/login sa fetch funkcijom, odjavljivanje, ispis korisničkog imena u headeru kad je ulogovan.
+ register.js - funkcije za registrovanje korisnika sa JS validacijom unosa, koristi se api/korisnici/create i fetch funkcija.
+ profil.js - funkcije vezane za profil stranicu
+ password_reset.js - funkcije za resetovanje lozinke

### /config/
+ core.php - podešavanja za JWT
+ database.php - klasa Database koja sadrži podatke o bazi i funkcija connect, za konektovanje sa bazom (PDO)

### /models/
+ korisnici.php - klasa Korisnik sa svim podacima iz baze i metodama
+ oglasi.php - klasa Oglas sa svim podacima i metodama

### /php-jwt-master - podešavanja za JWT

### /PHPmailer - podešavanja za salje maila sa resetovanom šifrom
### /recover_pass.php - stranica za generisanje i slanje nove šifre korisniku

### /profil/php - stranica koja pokazuje informacije o korisniku i njegove oglase, preko nje ima mogućnost da promeni oglas ili da ga obriše

## /register.php - stranica za registrovanje korisnika
