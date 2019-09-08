<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');

include_once '../../config/database.php';
include_once '../../models/oglasi.php';
//pokretanje konekcije
$database = new Database();
$db = $database->connect();

// kreira se objekat Oglas
$post = new Oglas($db);
// koristi se funkcija za citanje svih oglasa
$result = $post->read();
// broj redova koje smo dobili u rezultatu
$num = $result->rowCount();

if ($num > 0) {
    $oglasi_arr = array();
    $oglasi_arr['podaci'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $oglas = array(
            'oglas_id' => $oglas_id,
            'naziv' => html_entity_decode($naziv),
            'cena' => $cena,
            'slika' => $slika,
            'cpu' => $cpu,
            'cpu_opis' => html_entity_decode($cpu_opis),
            'ram' => $ram,
            'tip_rama' => html_entity_decode($tip_rama),
            'gpu' => $gpu,
            'gpu_opis' => html_entity_decode($gpu_opis),
            'ekran' => $ekran,
            'ekran_opis' => html_entity_decode($ekran_opis),
            'hdd1' => $hdd1,
            'hdd1_opis' => html_entity_decode($hdd1_opis),
            'hdd2' => $hdd2,
            'hdd2_opis' => html_entity_decode($hdd2_opis),
            'os' => $os,
            'slob_opis' => html_entity_decode($slob_opis),
            'lokacija' => html_entity_decode($Lokacija),
            'garancija' => html_entity_decode($garancija),
            'user_id' => $user_id,
        );
        

        array_push($oglasi_arr['podaci'], $oglas);
    }
    //zbog nasih slova ide JSON_UNESCAPED_UNICODE
    echo json_encode($oglasi_arr,JSON_UNESCAPED_UNICODE);
    
} else {
    echo json_encode(
        array('message' => 'Nisu pronađeni podaci')
    );
}
