# Laptop oglasi
Projekat u okviru IT obuke na Matf.
Cilj je izrada web sajta koji korisnicima nudi mogućnost objavljivanja oglasa za prodaju polovnih laptop uređaja sa jedne, kao i pregledanja po različitim kriterijumima sa druge strane. Sajtu će biti dodate i druge funkcionalnosti.

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