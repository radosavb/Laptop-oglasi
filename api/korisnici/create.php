<?php
//proveriti da li ovde treba da se doda nesto umesto *
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
header("Access-Control-Max-Age: 3600");

include_once '../../config/database.php';
include_once '../../models/korisnici.php';

//pokretanje konekcije
$database = new Database();
$db = $database->connect();
// kreira se objekat Oglas
$user = new Korisnik($db);

$data = json_decode(file_get_contents("php://input"));

$user->ime = $data->ime;
$user->prezime = $data->prezime;
$user->email = $data->email;
$user->sifra = $data->sifra;
$user->tel = $data->tel;
$user->adresa = $data->adresa;
$user->mode = $data->mode;


if(
    //proverava se da li su polja prazna, mode ce biti sigurno prazan
    //za telefon i adresu nisam siguran da li ce biti obavezno
    !empty($user->ime) &&
    !empty($user->prezime) &&
    !empty($user->email) &&
    !empty($user->sifra) &&
    !empty($user->tel) &&
    !empty($user->adresa) &&
    //proverava da li vec postoji korisnik sa tim emailom
    !$user->emailExists() &&
    $user->create()
){
 
    http_response_code(200);
    echo json_encode(array("error" => false,"message" => "Korisnik je kreiran."), JSON_UNESCAPED_UNICODE);
}
 
// message if unable to create user
else{
 
    http_response_code(400);
    echo json_encode(array("error" => true,"message" => "Email već postoji u bazi."), JSON_UNESCAPED_UNICODE);
}
