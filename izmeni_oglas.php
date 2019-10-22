<head>
    <?php

    include_once './includes/head.php';
    // include_once './config/database.php';

    ?>
    <title>Laptopdrom | Izmena oglasa</title>
</head>


<?php
include_once './includes/header.php';
?>
<?php

function oglasPodaci()
{
    $oglas_id = $_POST["oglas_id"];
    $url = isset($_SERVER["HTTPS"]) ? "https://" : "http://";
    $folder = $_SERVER['REQUEST_URI']; //folder i naziv fajla
    $parts = explode('/', $folder);
    $dir = $_SERVER['SERVER_NAME']; //localhost
    //nece da racuna poslednji deo, koju je naziv fajla
    for ($i = 0; $i < count($parts) - 1; $i++) {
        $dir .= $parts[$i] . "/";
    }
    $url .= $dir; //http://localhost/ime foldera/   

    $service_url = $url . 'api/oglasi/read.php?oglas_id=' . $oglas_id;

    $curl = curl_init($service_url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $curl_response = curl_exec($curl);
    curl_close($curl);
    //vraca podatke o trazenom oglasu
    return json_decode($curl_response);
}
//upisujemo tazeni oglas u obliku objekta u $oglas
$oglas = oglasPodaci();

?>