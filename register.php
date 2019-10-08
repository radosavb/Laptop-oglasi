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

    <div id="form" class="container w-75 my-5 bg-light p-1">
        <form action="" class="my-3">
            <div class="row">
                <div class="col-sm-6">
                    <label for="ime">Ime</label>
                    <input type="text" class="form-control" id="ime" name="ime" placeholder="Ime" required></div>
                <div class="col-sm-6">
                    <label for="prezime">Prezime</label>
                    <input type="text" class="form-control" id="prezime" name="prezime" placeholder="Prezime" required></div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-6">
                    <label for="ime">Telefon</label>
                    <input type="text" class="form-control" id="telefon" name="telefon" placeholder="Broj telefona" required></div>
                <div class="col-sm-6">
                    <label for="prezime">Adresa</label>
                    <input type="text" class="form-control" id="adresa" name="adresa" placeholder="Adresa" required></div>
            </div>

            <div class="form-group">
                <label class="mt-3" for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Unesite email" required>
            </div>
            <div class="form-group">
                <label for="password">Šifra</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Šifra" required>
            </div>
            <div class="form-group">
                <label for="password_check">Potvrdite šifru</label>
                <input type="password" class="form-control" id="password_check" name="password_check" placeholder="Potvrdite šifru" required>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="uslovi" required>
                <label class="form-check-label" for="uslovi" name="uslovi"> Prihvatam Pravila i uslove korišćenja Laptopdrom</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="godine" required>
                <label class="form-check-label" for="godine" name="godine"> Imam više od 16 godina</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="tester">
                <label class="form-check-label" for="tester" name="tester"> Želim da postanem tester</label>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Pošalji</button>
        </form>
    </div>
    <?php
    include_once './includes/footer.php';
    ?>
</body>

</html>