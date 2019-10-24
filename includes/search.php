<!DOCTYPE html>
<head>
<?php
include_once './includes/head.php';
?>
</head>

<?php
include_once 'sidebar.php';
include_once './config/database.php';

// Uspostavlja se konekcija sa bazom

$database = new Database();
$db = $database->connect();

//Ovo postavlja atribut za dohvatanje redova po objektu na default tako da ne mora da se navodi u fetchAll()

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

// Proverava da li postoji search, ako ne postiji on ide dole i ispisuje sve iz baze
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
    //Ukoliko je unet naziv za pretragu
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
    //Ukoliko su obeleženi checkboxovi
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
    $query .= " ORDER BY oglas_id DESC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $oglasi = $stmt->fetchAll();

    // Ako postoji laptop prema zadatom kriterijumu empty proverava da li je niz prazan, ako jeste (ne postoji laptop prema zadatim kriterijumima) onda ce da ispiše sadržaj dole, ako nije napraviće kartice
    if (!empty($oglasi)) {
        foreach ($oglasi as $oglas) {
        //Dodaje u karticu skraćeni opis laptopa (40 karaktera) uzet iz kolone slobodan opis
        $opis = $oglas->slob_opis;
        $kratak_opis=substr($opis,0,40);
        //Prave se kartice
        echo '<div id="kartica" class="card d-flex justify-content-around mb-3 mx-2">
        <img class="card-img-top" src="assets/images/'.$oglas->slika.'">
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
    //Ukoliko ne postoji laptop prema zadatim kriterijumima filtriranja, prikazuje se sledeća poruka
    else {
        echo '<div><p class="lead text-danger mx-2 px-5 py-2 bg-light">Nema rezultata za prikaz</p></div>';
    }
} else {

//Ispisuje sve podatke iz tabele ako search nije postavljen
    
    $sql = "SELECT * FROM oglas";
    $stmt = $db->prepare($sql);
    $stmt->execute();

//Pagination
// Ovde se menja broj oglasa koji se prikazuju na jednoj stranici
    $rezultata_po_stranici = 5;
//Određuje ukupan broj oglasa i broj stranica za prikaz
    $broj_oglasa = $stmt->rowCount();
    $broj_stranica = ceil($broj_oglasa/$rezultata_po_stranici);
//Ukoliko stranica nije zahtevana ona se postavlja na vrednost 1 (prikaz prvih x laptopova)
    if(!isset($_GET['page'])){
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
//Određuje se početni oglas zadate stranice
    $pocetni_oglas = ($page-1)*$rezultata_po_stranici;
//Upit za prikaz oglasa. Limitom je određen prvi oglas zadate stranice i broj narednih oglasa iz baze koji se prikazuju
    $sql = "SELECT * FROM oglas ORDER BY oglas_id DESC LIMIT " . $pocetni_oglas . ',' . $rezultata_po_stranici;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $oglasi = $stmt->fetchAll();

    foreach ($oglasi as $oglas) {
    //opet kratak oglas
    $opis = $oglas->slob_opis;
    $kratak_opis=substr($opis,0,40);
        echo '<div id="kartica" class="card d-flex justify-content-around mb-3 mx-2">
        <img class="card-img-top" src="assets/images/'.$oglas->slika.'">
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
            <a href="./read_single_oglas.php?oglas_id=' . $oglas->oglas_id . '" class="btn btn-primary w-100">Detaljnije</a>
        </div>
    </div>';
    }
        echo '<div class="container d-flex justify-content-center">
            <ul class="pagination my-3"';
            //Ukoliko pagination bar nije aktiviran, vrednost trenutne stranice se postavlja na 1. Ovo je neophodno kako bi se css svojstva prve ikonice pagination bara promenila iako nije kliknuto na nju
            if(!isset($_GET['page'])){
                $_GET['page'] = 1;
            }
        //Promena css svojstava za ikonicu pagination bara koja je trenutno aktivna
        for($page = 1; $page <= $broj_stranica; $page++){     
            //Definiše se css klasa aktivne ikonice
            $trenutna = 'trenutna';           
            if($page == $_GET['page']){        
                echo '<li class="page-item"><a class="page-link ' . $trenutna . '" href="index.php?page=' . $page . '">' . $page  . '</a></li>';
            }else{
                echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $page . '">' . $page  . '</a></li>';
            }
        }
        echo '</ul></div>';

}
