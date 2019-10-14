<!DOCTYPE html>

<head>
    <style>
    #uspeh, #neuspeh{
        position: fixed;
        left: 100px;
        top: 180px;
    }
    #neuspeh1{
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

    $naziv = $_POST['naziv'];
    $cena = $_POST['cena'];
    $cpu = $_POST['cpu'];
    $cpu_opis = $_POST['cpu_opis']; 
    $ram = $_POST['ram'];
    $tip_rama = $_POST['tip_rama'];
    $gpu = $_POST['gpu'];
    $gpu_opis = $_POST['gpu_opis'];
    $ekran = $_POST['ekran'];
    $ekran_opis = $_POST['ekran_opis'];
    $hdd1 = $_POST['hdd1'];
    $hdd1_opis = $_POST['hdd1_opis'];
    $hdd2 = $_POST['hdd2'];
    $hdd2_opis = $_POST['hdd2_opis'];
    $os = $_POST['os'];
    $slob_opis = $_POST['slob_opis'];
    $Lokacija = $_POST['Lokacija'];
    if(isset($_POST['garancija'])){
      $garancija = $_POST['garancija'];
    } else {
      $garancija = 0;
    }


if(isset($_POST['predaj_oglas'])){

    $target = "assets/images/".basename($_FILES['dodaj_sliku']['name']);
    $uploadOk = 1;

    $database = new Database();
    $db = $database->connect();

    $slika = $_FILES['dodaj_sliku']['name'];
    $velicina_slike = $_FILES['dodaj_sliku']['size'];
    $slika_tmp = $_FILES['dodaj_sliku']['tmp_name'];
    $slika_type = $_FILES['dodaj_sliku']['type'];
    $delovi = explode('.',$_FILES['dodaj_sliku']['name']);
    $slika_ext=strtolower(end($delovi));

    $ekstenzije= array("jpeg","jpg","png");

  if(!empty($_FILES['dodaj_sliku']['name'])){

        if(in_array($slika_ext,$ekstenzije) === false){
        echo '<div id="neuspeh" class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Nije dozvoljena odabrana ekstenzija dokumenta (izaberite JPG, JPEG ili PNG fajl)</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        $uploadOk = 0;
        }
//Sledeci deo koda ne radi. Kada je fajl veci od 2MB izbacuje niz greski.
        if($velicina_slike > 2097152){
        echo '<div id="neuspeh" class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Fajl mora da bude manji od 2MB</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        $uploadOk = 0;
        }

        if($uploadOk == 0){
        echo '<div id="neuspeh1" class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Vaš fajl nije otpremljen</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';

          die();

        }
      }
      else
      {
        $slika = 'default.png';
      }
 

    move_uploaded_file($slika_tmp, $target);

    $sql = 'INSERT INTO oglas (naziv, cena, slika, cpu, cpu_opis, ram, tip_rama, gpu, gpu_opis, ekran, ekran_opis, hdd1, hdd1_opis, hdd2, hdd2_opis, os, slob_opis, Lokacija, garancija) VALUES (:naziv, :cena,:slika, :cpu, :cpu_opis, :ram, :tip_rama, :gpu, :gpu_opis, :ekran, :ekran_opis, :hdd1, :hdd1_opis, :hdd2, :hdd2_opis, :os, :slob_opis, :Lokacija, :garancija)';
    $stmt = $db->prepare($sql);
    $stmt->execute(['naziv' => $naziv , 'cena' => $cena , 'slika'=> $slika, 'cpu'=> $cpu , 'cpu_opis' => $cpu_opis , 'ram' => $ram , 'tip_rama' => $tip_rama ,'gpu' => $gpu , 'gpu_opis' => $gpu_opis ,'ekran' => $ekran , 'ekran_opis' => $ekran_opis , 'hdd1' => $hdd1 , 'hdd1_opis' => $hdd1_opis , 'hdd2' => $hdd2 , 'hdd2_opis' => $hdd2_opis , 'os' => $os , 'slob_opis' => $slob_opis , 'Lokacija' => $Lokacija , 'garancija' => $garancija]);

    echo '<div id="uspeh" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Uspešno ste objavili oglas!</strong> <a href="index.php">Povratak na Početnu stranu</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';

};


    ?>