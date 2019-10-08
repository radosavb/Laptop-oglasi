<!DOCTYPE html>

<head>
    <?php
    include_once 'head.php';
    ?>
</head>

<header>
  <h1 id="naslov" class="display-4 pt-4 my-0 text-center">LAPTOP OGLASI</h1> 
</header>

<nav id="navbar" class="navbar bg-primary navbar-dark navbar-expand-lg sticky-top">
  <a class="navbar-brand" href="index.php"><img src="assets\images\logow.png" width="40px" ></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#meni">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="meni">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Laptopovi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">O nama</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Kontakt</a>
      </li>
    </ul>

  </div>
  <!-- Namerno sam ostavio da se ne collapse sa ostalim linkovima - Milos -->
  <ul class="navbar-nav text-center">
    <form action="" class="form-inline ">
      <input class="form-control mr-2 mb-2" type="text" placeholder="E-mail" name="username">
      <input class="form-control mr-2 mb-2" type="text" placeholder="Šifra" name="password">
      <button class="btn btn-success mr-2 mb-2" type="submit">Prijava</button>
      <!-- Registracija treba da vodi na drugu stranicu sa formularom za registraciju - Milos -->
      <a id="registracija_dugme" class="btn mr-2 mb-2" href="register.php">Registracija</a>
    </form>
  </ul>
</nav>