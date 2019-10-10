<!DOCTYPE html>

<head>
    <style>
#kartica:hover {
    box-shadow: 10px 10px 50px lightgrey; 
}
    </style>
</head>

<?php

include_once './includes/head.php';
include_once 'sidebar.php';
include_once './config/database.php';

$database = new Database();
$db = $database->connect();

//Ovo postavlja atribut za dohvatanje redova po objektu na default tako da ne mora da se navodi u fetchAll()

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

// proverava da li postoji search, ako ne on ide dole i ispisuje sve iz baze
if (
    isset($_GET['pretraga']) && $_GET['pretraga'] !== "" ||
    isset($_GET["min"]) ||
    isset($_GET["max"]) ||
    isset($_GET['cpu']) ||
    isset($_GET['ram']) ||
    isset($_GET['ekran']) ||
    isset($_GET['gpu']) ||
    isset($_GET['hdd1']) ||
    isset($_GET['hdd2']) ||
    isset($_GET['os'])
) {
    $query = "
        SELECT * FROM oglas WHERE 1
	";
    if (isset($_GET['pretraga']) && $_GET['pretraga'] !== "") {
        $sanitize = htmlspecialchars(strip_tags($_GET['pretraga']));
        $pretraga = '%' . $sanitize . '%';
        $query .= "
		 AND naziv LIKE '" . $pretraga . "'
		";
    }
    if (isset($_GET["min"]) && !empty($_GET["min"])) {
        $sanitize = htmlspecialchars(strip_tags($_GET['min']));
        $query .= "
        AND cena >= '" . $_GET["min"] . "'
		";
    }

    if (isset($_GET["max"]) && !empty($_GET["max"])) {
        $sanitize = htmlspecialchars(strip_tags($_GET['max']));
        $query .= "
        AND cena <= '" . $_GET["max"] . "'
		";
    }

    if (isset($_GET["cpu"])) {

        $filter = implode("','", $_GET["cpu"]);
        $query .= "
		 AND cpu IN('" . $filter . "')
		";
    }
    if (isset($_GET["ram"])) {
        $filter = implode("','", $_GET["ram"]);
        $query .= "
		 AND ram IN('" . $filter . "')
		";
    }
    if (isset($_GET["gpu"])) {
        $filter = implode("','", $_GET["gpu"]);
        $query .= "
		 AND gpu IN('" . $filter . "')
		";
    }
    if (isset($_GET["ekran"])) {
        $filter = implode("','", $_GET["ekran"]);
        $query .= "
		 AND ekran IN('" . $filter . "')
		";
    }
    if (isset($_GET["hdd1"])) {
        $filter = implode("','", $_GET["hdd1"]);
        $query .= "
		 AND hdd1 IN('" . $filter . "')
		";
    }
    if (isset($_GET["hdd2"])) {
        $filter = implode("','", $_GET["hdd2"]);
        $query .= "
		 AND hdd2 IN('" . $filter . "')
		";
    }
    if (isset($_GET["os"])) {
        $filter = implode("','", $_GET["os"]);
        $query .= "
		 AND os IN('" . $filter . "')
		";
    }
   
    $stmt = $db->prepare($query);
    $stmt->execute();
    $oglasi = $stmt->fetchAll();

    // bolje se empty nego isset, empty proverava da li je niz prazan, ako jeste onda ce da ispise gresku dole, ako nije napravice kartice
    if (!empty($oglasi)) {
        foreach ($oglasi as $oglas) {
        $opis = $oglas->slob_opis;
        $kratak_opis=substr($opis,0,40);
            echo '<div id="kartica" class="card d-flex justify-content-around mb-3 mx-2">
        <img class="card-img-top" src="assets/images/dell.jfif">
        <div class="card-body">
            <h5 class="card-title">' . $oglas->naziv . '</h5>
            <table class="table-striped w-100">
                <tr>
                    <td class="">Cena:</td>
                    <td class="text-danger px-1">' . $oglas->cena . '</td>
                </tr>
                <tr>
                    <td class="">Procesor: </td>
                    <td class="text-primary font-italic px-1">' . $oglas->cpu . '</td>                    
                </tr>
                <tr>
                    <td class="">RAM: </td>
                    <td class="text-primary px-1">' . $oglas->ram . ' GB</td>
                </tr>
            </table>
            <p class="card-text ">'. $kratak_opis .'...</p>
            <a href="./read_single_oglas.php?id=' . $oglas->oglas_id. '" class="btn btn-primary w-100">Detaljnije</a>
        </div>
    </div>';
        }
    } else {
        echo '<div><p class="lead text-danger mx-2 px-5 py-2 bg-light">Nema rezultata za prikaz</p></div>';
    }
} else {
    //ispisuje sve podatke iz tabele ako search nije postavljen
    $sql = 'SELECT * FROM oglas';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $oglasi = $stmt->fetchAll();

    foreach ($oglasi as $oglas) {
    $opis = $oglas->slob_opis;
    $kratak_opis=substr($opis,0,40);
        echo '<div id="kartica" class="card d-flex justify-content-around mb-3 mx-2">
        <img class="card-img-top" src="assets/images/dell.jfif">
        <div class="card-body">
            <h5 class="card-title">' . $oglas->naziv . '</h5>
            <table class="table-striped w-100">
                <tr>
                    <td class="">Cena:</td>
                    <td class="text-danger px-1">' . $oglas->cena . '</td>
                </tr>
                <tr>
                    <td class="">Procesor: </td>
                    <td class="text-primary font-italic px-1">' . $oglas->cpu . '</td>                    
                </tr>
                <tr>
                    <td class="">RAM: </td>
                    <td class="text-primary px-1">' . $oglas->ram . ' GB</td>
                </tr>
            </table>
            <p class="card-text ">'. $kratak_opis .'...</p>
            <a href="./read_single_oglas.php?oglas_id=' . $oglas->oglas_id. '" class="btn btn-primary w-100">Detaljnije</a>
        </div>
    </div>';
    }
}
