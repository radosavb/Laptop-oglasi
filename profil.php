<!DOCTYPE html>

<head>
    <?php
    include_once './includes/head.php';
    ?>
    <title>Laptopdrom | Korisnički profil</title>
</head>

<body>
    <!-- Header -->
    <?php
    include_once './includes/header.php';
    ?>
    <!-- Header -->
    <div class="container">
        <!-- Prikaz profila -->
        <div id="korisnickiProfil" class="row my-4">
            <div class="col-md-6">
                <table class="table table-sm">
                    <h3>Vaši podaci:</h3>
                    <tr>
                        <td><img class="w-100" src="./assets/images/korisnik.jpg" alt="Profilna slika"></td>
                    </tr>
                    <tr>
                        <td>Ime:</td>
                        <td><input id="ime" class="border-0 w-100" readonly type="text"></td>
                    </tr>
                    <tr>
                        <td>Prezime: </td>
                        <td><input id="prezime" class="border-0 w-100" readonly type="text"></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><input id="email" class="border-0 w-100" readonly type="text"></td>
                    </tr>
                    <tr>
                        <td>Telefon: </td>
                        <td><input id="tel" class="border-0 w-100" readonly type="text"></td>
                    </tr>
                    <tr>
                        <td>Adresa: </td>
                        <td><input id="adresa" class="border-0 w-100" readonly type="text"></td>
                    </tr>
                    <tr class="text-center">
                        <td></td>
                        <td>
                            <button id="izmeniPodatke" class="btn btn-primary">Izmeni podatke</button>
                            <button id="promeniLozinku" class="btn btn-warning">Promeni lozinku</button>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <h3>Vaši oglasi:</h3>
                <table id="oglasiTabela" class="table table-bordered">                  
                </table>
            </div>
        </div>
        <!-- Poruka ako korisnik nije ulogovan -->
        <div id="nisteUlogovani" class="alert alert-danger my-5" role="alert">
            <h4 class="alert-heading">Paznja!</h4>
            <p>Ne možete da pristupite ovoj stranici zato što niste ulogovani.</p>
            <hr>
            <p class="mb-0">Molimo Vas da se <a href="register.php">registrujete</a> ili prijavite.</p>
        </div>

    </div>
    <script src="./assets/js/profil.js"></script>



    <!-- Footer -->
    <?php
    include_once './includes/footer.php';
    ?>
    <!-- Footer -->
</body>

</html>