<!DOCTYPE html>

<head>
  <?php
  include_once 'head.php';
  ?>
</head>
<!-- Naslov sajta -->
<header>
  <h1 id="naslov" class="my-0 pt-3">LAPTOPDROM</h1>
</header>
  <!-- Navbar sa sticky pozicioniranjem. Nakon scrolovanja naslova ostaje fiksiran za vrh stranice.  Na ekranima sa manjom rezolucijom "kolapsuje" i prikazuje se opet klikom na dugme-->
<nav id="navbar" class="navbar bg-primary navbar-dark navbar-expand-lg">
  <!-- Logo sajta -->
  <a style="border-bottom:none;" class="navbar-brand" href="index.php"><img src="assets\images\logow.png" width="40px"></a>
  <!-- Dugme za collapse -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#meni">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Linkovi ka stranicama u okviru sajta-->
  <div class="collapse navbar-collapse" id="meni">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link text-white" href="./index.php">Laptopovi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white text-nowrap" href="#">O nama</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Kontakt</a>
      </li>
    </ul>

  </div>
  <!-- Namerno sam ostavio da se ne collapse sa ostalim linkovima - Milos -->
  <ul class="navbar-nav text-center">
    <!-- Formular za prijavu -->
    <form action="" class="form-inline " id="login_form">
      <input class="form-control mr-2 mb-2" type="text" id="login_email" placeholder="E-mail" name="email">
      <input class="form-control mr-2 mb-2" type="password" id="login_sifra" placeholder="Šifra" name="password">
      <button class="btn btn-success mr-2 mb-2" id="login_submit" type="button">Prijava</button>
      <!-- Registracija treba da vodi na drugu stranicu sa formularom za registraciju - Milos -->
      <a id="registracija_dugme" class="btn mr-2 mb-2" href="register.php">Registracija</a>
    </form>
    <!-- dropdown meni za dugme zaboravljena šifra -->
    <div class="dropdown"  id="forgot_pass">
      <button class="btn btn-warning dropdown-toggle mr-2 mb-2" type="button"  data-toggle="dropdown">
        Zaboravljena šifra?
      </button>
      <form class="dropdown-menu p-4" action="recover_pass.php" method="POST">
        <div class="form-group">
          <label for="emailDropdown">Poslaćemo Vam novu šifru na email</label>
          <input type="email" class="form-control" name="forgot_email" id="forgot_email" required placeholder="Unesite Vaš email...">
        </div>        
        <p class="text-danger" id="forgot_message"></p> 
        <button type="button" id="reset_pass" class="btn btn-primary">Pošalji</button>        
      </form>
    </div>
    </div>
  <!-- Polje za prikaz linka (ime korisnika) ka profilnoj stranici kada je korisnik prijavljen -->
    <div id="profil">
    <span class="text-white px-2">Profil: <a href="profil.php" class="text-white text-capitalize font-weight-bold" id="ime_korisnika"></a></span><button id="odjava" class="btn btn-primary">Odjava</button>
    </div>
  </ul>
</nav>
<script src="assets/js/login.js"></script>
<script src="assets/js/password_reset.js"></script>