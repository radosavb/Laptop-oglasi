<?php

// Import PHPMailer classes into the global namespace
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require './PHPMailer/src/Exception.php';

include_once './config/database.php';
include_once './models/korisnici.php';

//pokretanje konekcije
$database = new Database();
$db = $database->connect();
// kreira se objekat Oglas
$user = new Korisnik($db);

//mail za koji je trazena sifra
$email = htmlspecialchars(strip_tags($_POST['forgot_email']));
$user->email = $email;

//proverava da li postoji mail u bazi
if ($user->emailExists()) {

    //funkcija koja generise random string
    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    //pravi se nova sifra
    $nova_sifra = generateRandomString();
    //upisuje se nova sifra za dalje koriscenje
    $user->sifra = $nova_sifra;
    //update se korisnicki profil sa novom sifrom
    $user->update();

    //kreira se mail da se posalje korisniku sa njegovom novom sifrom
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "laptopdrom@gmail.com";
    $mail->Password = "Laptopdrom123";
    $mail->SetFrom("laptopdrom@gmail.com", "Laptopdrom Oglasi");
    $mail->Subject = "Resetovanje lozinke";
    $mail->Body = "Poštovani/a, <br><br> Vaša nova šifra za logovanje na Laptopdrom sajt je <b>$nova_sifra</b>  <br><br> Srdačan pozdrav, <br><br>  Ekipa Laptopdrom";
    $mail->AddAddress($email);

    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Poruka: Nova šifra je poslata na Vaš email";
    }
} else {
    echo "Poruka: Mail ne postoji u bazi";
}
