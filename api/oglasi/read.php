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

//proverava da li je podesen ID
if ((isset($_GET['oglas_id']) && $_GET['oglas_id'] != "")) {
    $post->oglas_id =  $_GET['oglas_id'];

    //Ako jeste citamo samo taj jedan oglas
    if ($post->read_single()) {
        $oglas = array(
            'oglas_id' => $post->oglas_id,
            'naziv' => $post->naziv,
            'cena' => $post->cena,
            'slika' => $post->slika,
            'cpu' => $post->cpu,
            'cpu_opis' => $post->cpu_opis,
            'ram' => $post->ram,
            'tip_rama' => $post->tip_rama,
            'gpu' => $post->gpu,
            'gpu_opis' => $post->gpu_opis,
            'ekran' => $post->ekran,
            'ekran_opis' => $post->ekran_opis,
            'hdd1' => $post->hdd1,
            'hdd1_opis' => $post->hdd1_opis,
            'hdd2' => $post->hdd2,
            'hdd2_opis' => $post->hdd2_opis,
            'os' => $post->os,
            'slob_opis' => $post->slob_opis,
            'lokacija' => $post->lokacija,
            'garancija' => $post->garancija,
            'datum_oglasa' => $post->datum_oglasa,
            'user_id' => $post->user_id
        );
    } else {
        $oglas = array(
            'message' => 'Ne postoji taj ID'
        );
    }
    echo (json_encode($oglas,JSON_UNESCAPED_UNICODE));
} else {
    //Ako nije koristi se funkcija za citanje svih oglasa
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
                'naziv' => $naziv,
                'cena' => $cena,
                'slika' => $slika,
                'cpu' => $cpu,
                'cpu_opis' => $cpu_opis,
                'ram' => $ram,
                'tip_rama' => $tip_rama,
                'gpu' => $gpu,
                'gpu_opis' => $gpu_opis,
                'ekran' => $ekran,
                'ekran_opis' => $ekran_opis,
                'hdd1' => $hdd1,
                'hdd1_opis' => $hdd1_opis,
                'hdd2' => $hdd2,
                'hdd2_opis' => $hdd2_opis,
                'os' => $os,
                'slob_opis' => $slob_opis,
                'lokacija' => $lokacija,
                'garancija' => $garancija,
                'datum_oglasa' => $datum_oglasa,
                'user_id' => $user_id,
            );


            array_push($oglasi_arr['podaci'], $oglas);
        }
        //zbog nasih slova ide JSON_UNESCAPED_UNICODE
        echo json_encode($oglasi_arr, JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode(
            array('message' => 'Nisu pronađeni podaci')
        );
    }
}

///api/oglasi/read.php - cita sve oglase
//api/oglasi/id/1 - cita pojedinacno
