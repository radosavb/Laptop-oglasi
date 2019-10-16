<!DOCTYPE html>

<head>
  <style>
    #uspeh,
    #neuspeh {
      position: fixed;
      left: 100px;
      top: 180px;
    }

    #neuspeh1 {
      position: fixed;
      left: 100px;
      top: 230px;
    }
  </style>
</head>

<?php

include_once 'unos_oglasa.php';
include_once './includes/head.php';
include_once './config/database.php';

function getUserId()
{

  $url = isset($_SERVER["HTTPS"]) ? "https://" : "http://";
  $folder = $_SERVER['REQUEST_URI']; //folder i naziv fajla
  $parts = explode('/', $folder);
  $dir = $_SERVER['SERVER_NAME']; //localhost
  //nece da racuna poslednji deo, koju je naziv fajla
  for ($i = 0; $i < count($parts) - 1; $i++) {
    $dir .= $parts[$i] . "/";
  }
  $url .= $dir; //http://localhost/ime foldera/

  //uzimamo vrednost cookie
  $tokenJWT = $_COOKIE['jwt'];

  $service_url = $url . '/api/korisnici/validate_token.php';
  $curl = curl_init($service_url);
  $curl_post_data = array(
    'jwt' => $tokenJWT
  );
  $data = json_encode($curl_post_data);

  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json; charset=UTF-8'
  ));
  $curl_response = curl_exec($curl);
  curl_close($curl);
  $decoded = json_decode($curl_response);
  $user_id = $decoded->data->user_id;
  return $user_id;
}


$user_id = getUserId();
$naziv = htmlspecialchars(strip_tags($_POST['naziv']));
$cena = htmlspecialchars(strip_tags($_POST['cena']));
$cpu = $_POST['cpu'];
$cpu_opis = htmlspecialchars(strip_tags($_POST['cpu_opis']));
$ram = $_POST['ram'];
$tip_rama = $_POST['tip_rama'];
$gpu = $_POST['gpu'];
$gpu_opis = htmlspecialchars(strip_tags($_POST['gpu_opis']));
$ekran = $_POST['ekran'];
$ekran_opis = htmlspecialchars(strip_tags($_POST['ekran_opis']));
$hdd1 = $_POST['hdd1'];
$hdd1_opis = htmlspecialchars(strip_tags($_POST['hdd1_opis']));
$hdd2 = $_POST['hdd2'];
$hdd2_opis = htmlspecialchars(strip_tags($_POST['hdd2_opis']));
$os = $_POST['os'];
$slob_opis = htmlspecialchars(strip_tags($_POST['slob_opis']));
$Lokacija = htmlspecialchars(strip_tags($_POST['Lokacija']));
if (isset($_POST['garancija'])) {
  $garancija = $_POST['garancija'];
} else {
  $garancija = 0;
}


if (isset($_POST['predaj_oglas'])) {

  $target = "assets/images/" . basename($_FILES['dodaj_sliku']['name']);
  $uploadOk = 1;

  $database = new Database();
  $db = $database->connect();

  $slika = $_FILES['dodaj_sliku']['name'];
  $velicina_slike = $_FILES['dodaj_sliku']['size'];
  $slika_tmp = $_FILES['dodaj_sliku']['tmp_name'];
  $slika_type = $_FILES['dodaj_sliku']['type'];
  $delovi = explode('.', $_FILES['dodaj_sliku']['name']);
  $slika_ext = strtolower(end($delovi));

  $ekstenzije = array("jpeg", "jpg", "png", "jfif");

  if (!empty($_FILES['dodaj_sliku']['name'])) {

    if (in_array($slika_ext, $ekstenzije) === false) {
      echo '<div id="neuspeh" class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Nije dozvoljena odabrana ekstenzija dokumenta (izaberite JPG, JPEG, JFIF ili PNG fajl)</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
      $uploadOk = 0;
    }

    if ($velicina_slike > 2097152) {
      echo '<div id="neuspeh" class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Fajl mora da bude manji od 2MB</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo '<div id="neuspeh1" class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Vaš oglas nije otpremljen</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
      die();
    }
  } else {
    $slika = 'default.png';
  }

  move_uploaded_file($slika_tmp, $target);

  $sql = 'INSERT INTO oglas (naziv, cena, slika, cpu, cpu_opis, ram, tip_rama, gpu, gpu_opis, ekran, ekran_opis, hdd1, hdd1_opis, hdd2, hdd2_opis, os, slob_opis, Lokacija, garancija, user_id) VALUES (:naziv, :cena,:slika, :cpu, :cpu_opis, :ram, :tip_rama, :gpu, :gpu_opis, :ekran, :ekran_opis, :hdd1, :hdd1_opis, :hdd2, :hdd2_opis, :os, :slob_opis, :Lokacija, :garancija, :user_id)';
  $stmt = $db->prepare($sql);
  $stmt->execute(['naziv' => $naziv, 'cena' => $cena, 'slika' => $slika, 'cpu' => $cpu, 'cpu_opis' => $cpu_opis, 'ram' => $ram, 'tip_rama' => $tip_rama, 'gpu' => $gpu, 'gpu_opis' => $gpu_opis, 'ekran' => $ekran, 'ekran_opis' => $ekran_opis, 'hdd1' => $hdd1, 'hdd1_opis' => $hdd1_opis, 'hdd2' => $hdd2, 'hdd2_opis' => $hdd2_opis, 'os' => $os, 'slob_opis' => $slob_opis, 'Lokacija' => $Lokacija, 'garancija' => $garancija, 'user_id' => $user_id]);

  echo '<div id="uspeh" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Uspešno ste objavili oglas!</strong> <a href="index.php">Povratak na Početnu stranu</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
};


?>