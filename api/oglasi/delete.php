<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
//DELETE method!!
header('Access-Control-Allow-Methods: DELETE');
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

$post->oglas_id = $data->oglas_id;

if ($post->delete()) {
    echo json_encode(
        array('message' => 'Oglas je obrisan')
    );
} else {
    echo json_encode(
        array('message' => 'Oglas nije obrisan')
    );
}