<?php

// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");

include_once 'sidebar.php';
include_once './config/database.php';

$database = new Database();
$db = $database->connect();

//Ovo postavlja atribut za dohvatanje redova po objektu na default tako da ne mora da se navodi u fetchAll()

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

// dodao sam ovo na pocetak da odmah proveri da li postoji search, ako ne on ide dole i ispisuje sve iz baze
if (isset($_POST['pretraga']) && $_POST['pretraga'] !== "") {
    $pretraga = '%' . $_POST['pretraga'] . '%';

    //ovaj deo sam isto malo promenio
    $sql = 'SELECT * FROM oglas WHERE naziv LIKE ? ORDER BY naziv';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1, $pretraga);
    $stmt->execute();
    $oglasi = $stmt->fetchAll();
    
    // bolje se empty nego isset, empty proverava da li je niz prazan, ako jeste onda ce da ispise gresku dole, ako nije napravice kartice
    if (!empty($oglasi)) {
        foreach ($oglasi as $oglas) {
            echo '<div id="kartica" class="card d-flex justify-content-around mb-3 mx-2">
        <img class="card-img-top" src="assets/images/dell.jfif">
        <div class="card-body">
            <h5 class="card-title">' . $oglas->naziv . '</h5>
            <table>
                <tr>
                    <td>Cena:</td>
                    <td class="text-danger">' . $oglas->cena . '</td>
                </tr>
                <tr>
                    <td>Ocena: </td>
                    <td class="w-100">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">4/5</div>
                        </div>
                    </td>
                </tr>
            </table>
            <p class="card-text"></p>
            <a href="#" class="btn btn-primary w-100">Detaljnije</a>
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
        echo '<div id="kartica" max-width:30px"; class="card d-flex justify-content-around mb-3 mx-2">
        <img class="card-img-top" src="assets/images/dell.jfif">
        <div class="card-body">
            <h5 class="card-title">' . $oglas->naziv . '</h5>
            <table>
                <tr>
                    <td>Cena:</td>
                    <td class="text-danger">' . $oglas->cena . '</td>
                </tr>
                <tr>
                    <td>Ocena: </td>
                    <td class="w-100">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">4/5</div>
                        </div>
                    </td>
                </tr>
            </table>
            <p class="card-text"></p>
            <a href="#" class="btn btn-primary w-100">Detaljnije</a>
        </div>
    </div>';
    }
}
