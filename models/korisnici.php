<?php

class Korisnik
{
    private $conn;
    private $table = 'korisnici';

    public $user_id;
    public $ime;
    public $prezime;
    public $email;
    public $sifra;
    public $tel;
    public $adresa;
    public $mode;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function create()
    {
        $query = 'INSERT INTO ' . $this->table . ' 
            SET
                ime = :ime,
                prezime = :prezime,
                email = :email,
                sifra = :sifra,
                tel = :tel,
                adresa = :adresa,
                mode = :mode';


        $stmt = $this->conn->prepare($query);

        $this->ime = htmlspecialchars(strip_tags($this->ime));
        $this->prezime = htmlspecialchars(strip_tags($this->prezime));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->sifra = htmlspecialchars(strip_tags($this->sifra));
        $this->tel = htmlspecialchars(strip_tags($this->tel));
        $this->adresa = htmlspecialchars(strip_tags($this->adresa));
        $this->mode = htmlspecialchars(strip_tags($this->mode));

        $stmt->bindParam(':ime', $this->ime);
        $stmt->bindParam(':prezime', $this->prezime);
        $stmt->bindParam(':email', $this->email);
        //Hashujemo sifru
        $sifra_hash = password_hash($this->sifra, PASSWORD_BCRYPT);
        $stmt->bindParam(':sifra', $sifra_hash);
        $stmt->bindParam(':tel', $this->tel);
        $stmt->bindParam(':adresa', $this->adresa);
        $stmt->bindParam(':mode', $this->mode);

        if ($stmt->execute()) {
            return true;
        }
        //ako postoji greska ispisuje je
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // proverava da li mail postoji u bazi
    function emailExists()
    {

        
        $query = 'SELECT user_id, ime, prezime, sifra, tel, adresa, mode
                FROM ' . $this->table . '
                WHERE email = ?
                LIMIT 0,1';

        
        $stmt = $this->conn->prepare($query);

        
        $this->email = htmlspecialchars(strip_tags($this->email));

        $stmt->bindParam(1, $this->email);

        $stmt->execute();

        $num = $stmt->rowCount();

        // Ako email postoji dodeljujemo vrednosti objektu radi lakseg koriscenja
        if ($num > 0) {

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->user_id = $row['user_id'];
            $this->ime = $row['ime'];
            $this->prezime = $row['prezime'];
            $this->sifra = $row['sifra'];
            $this->tel = $row['tel'];
            $this->adresa = $row['adresa'];
            $this->mode = $row['mode'];

            // true ako mail postoji
            return true;
        }

        // false ako mail ne postoji
        return false;
    }

    public function update()
    {

        $query = 'UPDATE ' . $this->table . '
        SET                           
          ime= :ime, 
          prezime= :prezime, 
          sifra= :sifra, 
          tel= :tel, 
          adresa= :adresa, 
          mode= :mode
         WHERE 
          user_id= :user_id';

        $stmt = $this->conn->prepare($query);

        //"cistimo unos", skidamo html tagove  
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->ime = htmlspecialchars(strip_tags($this->ime));
        $this->prezime = htmlspecialchars(strip_tags($this->prezime));
        $this->sifra = htmlspecialchars(strip_tags($this->sifra));
        $this->tel = htmlspecialchars(strip_tags($this->tel));
        $this->adresa = htmlspecialchars(strip_tags($this->adresa));
        $this->mode = htmlspecialchars(strip_tags($this->mode));


        //povezijemo podatke sa query 
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':ime', $this->ime);
        $stmt->bindParam(':prezime', $this->prezime);
        $sifra_hash = password_hash($this->sifra, PASSWORD_BCRYPT);
        $stmt->bindParam(':sifra', $sifra_hash);        
        $stmt->bindParam(':tel', $this->tel);
        $stmt->bindParam(':adresa', $this->adresa);
        $stmt->bindParam(':mode', $this->mode);        

        if ($stmt->execute()) {
            return true;
        }
        //ako postoji greska ispisuje je
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}
