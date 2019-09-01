<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <title>Laptopdrom | specijalizovan sajt za polovne laptopove</title>

</head>
<header>
  <h1 class="display-4 py-2 text-dark my-0 text-center font-weight-bold">LAPTOPDROM</h1>
</header>

<nav class="navbar bg-primary navbar-dark navbar-expand-lg sticky-top">
  <a class="navbar-brand" href="#"><img src="assets\images\logow.png" width="40px"></a>
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
      <input class="form-control mr-2 mb-2" type="text" placeholder="Korisničko ime" name="username">
      <input class="form-control mr-2 mb-2" type="text" placeholder="Šifra" name="password">
      <button class="btn btn-success mr-2 mb-2" type="submit">Prijava</button>
      <!-- Registracija treba da vodi na drugu stranicu sa formularom za registraciju - Milos -->
      <a class="btn btn-success mr-2 mb-2" href="#">Registracija</a>
    </form>
  </ul>
</nav>