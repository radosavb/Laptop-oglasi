<?php
// proveriti da li ide nesto drugo osim *
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 

include_once '../../config/database.php';
include_once '../../models/korisnici.php';
 
$database = new Database();
$db = $database->connect();
 
$user = new Korisnik($db);
 
$data = json_decode(file_get_contents("php://input"));
 
// set product property values
$user->email = $data->email;
$email_exists = $user->emailExists();
 
// generate json web token
include_once '../../config/core.php';
include_once '../../php-jwt-master/src/BeforeValidException.php';
include_once '../../php-jwt-master/src/ExpiredException.php';
include_once '../../php-jwt-master/src/SignatureInvalidException.php';
include_once '../../php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;
 
//proverava da li postoji email i ako postoji on upisuje ostale podatke u user, recimo ovde $user->password, pogledaj lepo funkciju u user.php
if($email_exists && password_verify($data->sifra, $user->sifra)){
 
    $token = array(
       "iss" => $iss,
       "aud" => $aud,
       "iat" => $iat,
       "nbf" => $nbf,
       "data" => array(
           "user_id" => $user->user_id,
           "ime" => $user->ime,
           "prezime" => $user->prezime,
           "email" => $user->email,
           "tel" => $user->tel,
           "adresa" => $user->adresa,
           "mode" => $user->mode
       )
    );
 
    http_response_code(200);
 
    // generisanje jwt
    $jwt = JWT::encode($token, $key);
    echo json_encode(
            array(
                "message" => "Uspešna prijava.",
                "jwt" => $jwt
            ), JSON_UNESCAPED_UNICODE
        );
 
}
 
else{
 
    http_response_code(401);
 
    echo json_encode(array("message" => "Pogresan email ili šifra."),JSON_UNESCAPED_UNICODE);
}
?>