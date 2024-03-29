<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


include_once '../../config/database.php';
include_once '../../models/oglasi.php';
//pokretanje konekcije
$database = new Database();
$db = $database->connect();
// kreira se objekat Oglas
$post = new Oglas($db);

//uzimamo podatke sa inputa
$data = json_decode(file_get_contents("php://input"));


$post->naziv = $data->naziv;
$post->cena = $data->cena;
$post->slika = $data->slika;
$post->cpu = $data->cpu;
$post->cpu_opis = $data->cpu_opis;
$post->ram = $data->ram;
$post->tip_rama = $data->tip_rama;
$post->gpu = $data->gpu;
$post->gpu_opis = $data->gpu_opis;
$post->ekran = $data->ekran;
$post->ekran_opis = $data->ekran_opis;
$post->hdd1 = $data->hdd1;
$post->hdd1_opis = $data->hdd1_opis;
$post->hdd2 = $data->hdd2;
$post->hdd2_opis = $data->hdd2_opis;
$post->os = $data->os;
$post->slob_opis = $data->slob_opis;
$post->lokacija = $data->lokacija;
$post->garancija = $data->garancija;
$post->user_id = $data->user_id;


if ($post->create()) {
    echo json_encode(
        array('message' => 'Kreiran je novi oglas')
    );
} else {
    echo json_encode(
        array('message' => 'Oglas nije kreiran')
    );
}
