<?php
class Oglas
{

    private $conn;
    private $table = 'oglas';

    public $oglas_id;
    public $naziv;
    public $cena;
    public $slika;
    public $cpu;
    public $cpu_opis;
    public $ram;
    public $tip_rama;
    public $gpu;
    public $gpu_opis;
    public $ekran;
    public $ekran_opis;
    public $hdd1;
    public $hdd1_opis;
    public $hdd2;
    public $hdd2_opis;
    public $os;
    public $slob_opis;
    public $Lokacija;
    public $garancija;
    public $user_id;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    // Cita sve oglase
    public function read()
    {

        $query = 'SELECT * FROM ' . $this->table;


        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }
}
