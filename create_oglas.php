<!DOCTYPE html>

<head>
    <style>
    #uspeh{
        position: fixed;
        left: 100px;
        top: 180px;
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
    // $garancija = $_POST['garancija'];


if(isset($_POST['predaj_oglas'])){
    $database = new Database();
    $db = $database->connect();

    $sql = 'INSERT INTO oglas (naziv, cena, cpu, cpu_opis, ram, tip_rama, gpu, gpu_opis, ekran, ekran_opis, hdd1, hdd1_opis, hdd2, hdd2_opis, os, slob_opis, Lokacija, garancija) VALUES (:naziv, :cena, :cpu, :cpu_opis, :ram, :tip_rama, :gpu, :gpu_opis, :ekran, :ekran_opis, :hdd1, :hdd1_opis, :hdd2, :hdd2_opis, :os, :slob_opis, :Lokacija, :garancija)';
    $stmt = $db->prepare($sql);
    $stmt->execute(['naziv' => $naziv , 'cena' => $cena , 'cpu'=> $cpu , 'cpu_opis' => $cpu_opis , 'ram' => $ram , 'tip_rama' => $tip_rama ,'gpu' => $gpu , 'gpu_opis' => $gpu_opis ,'ekran' => $ekran , 'ekran_opis' => $ekran_opis , 'hdd1' => $hdd1 , 'hdd1_opis' => $hdd1_opis , 'hdd2' => $hdd2 , 'hdd2_opis' => $hdd2_opis , 'os' => $os , 'slob_opis' => $slob_opis , 'Lokacija' => $Lokacija , 'garancija' => $garancija]);

    echo '<div id="uspeh" class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Uspešno ste objavili oglas!</strong> <a href="index.php">Povratak na Početnu stranu</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';

};


    ?>