<!DOCTYPE html>
<html>

<head>
    <?php
    include_once './includes/head.php'
    ?>
    <title>Laptopdrom | Registracija</title>
</head>

<body>

    <?php
    include_once './includes/header.php'
    ?>

    <div id="registracija_form" class="container w-75 my-5 bg-light p-1">

        <form action="#" class="my-3" method="POST">
            <p class="text-danger">*Sva polja su obavezna</p>
            <div class="row">
                <div class="col-sm-6">
                    <label for="ime">Ime</label>
                    <input type="text" class="form-control" id="ime" name="ime" placeholder="Ime" required>
                    <small id="greska_ime"></small>
                </div>
                <div class="col-sm-6">
                    <label for="prezime">Prezime</label>
                    <input type="text" class="form-control" id="prezime" name="prezime" placeholder="Prezime" required>
                    <small id="greska_prezime"></small>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-6">
                    <label for="ime">Telefon</label>
                    <input type="text" class="form-control" id="tel" name="tel" placeholder="Broj telefona" required>
                    <small id="greska_tel"></small>
                </div>
                <div class="col-sm-6">
                    <label for="prezime">Adresa</label>
                    <input type="text" class="form-control" id="adresa" name="adresa" placeholder="Adresa" required>
                    <small id="greska_adresa"></small>
                </div>
            </div>

            <div class="form-group">
                <label class="mt-3" for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Unesite email" required>
                <small id="greska_email"></small>
            </div>
            <div class="form-group">
                <label for="sifra">Šifra</label>
                <input type="password" class="form-control" id="sifra" name="sifra" placeholder="Šifra" required>
                <small id="greska_sifra"></small>
            </div>
            <div class="form-group">
                <label for="sifra_provera">Potvrdite šifru</label>
                <input type="password" class="form-control" id="sifra_provera" name="sifra_provera" placeholder="Potvrdite šifru" required>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="uslovi" required>
                <label class="form-check-label" for="uslovi" name="uslovi"> Prihvatam Pravila i uslove korišćenja Laptopdrom</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="godine" required>
                <label class="form-check-label" for="godine" name="godine"> Imam više od 16 godina</label>
                <br>
                <small id="greska_uslovi"></small>
                <div id="json_odgovor" class="alert" role="alert"></div>
            </div>
            <button id="submit" type="button" class="btn btn-primary">Pošalji</button>
        </form>
    </div>
    <?php
    include_once './includes/footer.php';
    ?>

    <script src="assets/js/register.js"></script>
</body>

</html>