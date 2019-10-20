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
    public $lokacija;
    public $garancija;
    public $datum_oglasa;
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
    //cita jedan oglas
    public function read_single()
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE oglas_id=?';

        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(1, $this->oglas_id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row !== false) {
            $this->naziv = $row['naziv'];
            $this->cena = $row['cena'];
            $this->slika = $row['slika'];
            $this->cpu = $row['cpu'];
            $this->cpu_opis = $row['cpu_opis'];
            $this->ram = $row['ram'];
            $this->tip_rama = $row['tip_rama'];
            $this->gpu = $row['gpu'];
            $this->gpu_opis = $row['gpu_opis'];
            $this->ekran = $row['ekran'];
            $this->ekran_opis = $row['ekran_opis'];
            $this->hdd1 = $row['hdd1'];
            $this->hdd1_opis = $row['hdd1_opis'];
            $this->hdd2 = $row['hdd2'];
            $this->hdd2_opis = $row['hdd2_opis'];
            $this->os = $row['os'];
            $this->slob_opis = $row['slob_opis'];
            $this->lokacija = $row['lokacija'];
            $this->garancija = $row['garancija'];
            $this->datum_oglasa = $row['datum_oglasa'];
            $this->user_id = $row['user_id'];
            return true;
        } else {
            return false;
        }
    }

    public function create()
    {
        $query = 'INSERT INTO ' . $this->table . '
              SET 
                                
                naziv= :naziv, 
                cena= :cena, 
                slika= :slika, 
                cpu= :cpu, 
                cpu_opis= :cpu_opis, 
                ram= :ram, 
                tip_rama=  :tip_rama, 
                gpu= :gpu, 
                gpu_opis= :gpu_opis, 
                ekran= :ekran, 
                ekran_opis= :ekran_opis, 
                hdd1= :hdd1, 
                hdd1_opis=:hdd1_opis, 
                hdd2= :hdd2, 
                hdd2_opis=:hdd2_opis, 
                os=:os, 
                slob_opis=:slob_opis, 
                lokacija= :lokacija, 
                garancija= :garancija, 
                user_id= :user_id';


        $stmt = $this->conn->prepare($query);

        //"cistimo unos", skidamo html tagove    
        $this->naziv = htmlspecialchars(strip_tags($this->naziv));
        $this->cena = htmlspecialchars(strip_tags($this->cena));
        $this->slika = htmlspecialchars(strip_tags($this->slika));
        $this->cpu = htmlspecialchars(strip_tags($this->cpu));
        $this->cpu_opis = htmlspecialchars(strip_tags($this->cpu_opis));
        $this->ram = htmlspecialchars(strip_tags($this->ram));
        $this->tip_rama = htmlspecialchars(strip_tags($this->tip_rama));
        $this->gpu = htmlspecialchars(strip_tags($this->gpu));
        $this->gpu_opis = htmlspecialchars(strip_tags($this->gpu_opis));
        $this->ekran = htmlspecialchars(strip_tags($this->ekran));
        $this->ekran_opis = htmlspecialchars(strip_tags($this->ekran_opis));
        $this->hdd1 = htmlspecialchars(strip_tags($this->hdd1));
        $this->hdd1_opis = htmlspecialchars(strip_tags($this->hdd1_opis));
        $this->hdd2 = htmlspecialchars(strip_tags($this->hdd2));
        $this->hdd2_opis = htmlspecialchars(strip_tags($this->hdd2_opis));
        $this->os = htmlspecialchars(strip_tags($this->os));
        $this->slob_opis = htmlspecialchars(strip_tags($this->slob_opis));
        $this->lokacija = htmlspecialchars(strip_tags($this->lokacija));
        $this->garancija = htmlspecialchars(strip_tags($this->garancija));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));

        //povezijemo podatke sa query    
        $stmt->bindParam(':naziv', $this->naziv);
        $stmt->bindParam(':cena', $this->cena);
        $stmt->bindParam(':slika', $this->slika);
        $stmt->bindParam(':cpu', $this->cpu);
        $stmt->bindParam(':cpu_opis', $this->cpu_opis);
        $stmt->bindParam(':ram', $this->ram);
        $stmt->bindParam(':tip_rama', $this->tip_rama);
        $stmt->bindParam(':gpu', $this->gpu);
        $stmt->bindParam(':gpu_opis', $this->gpu_opis);
        $stmt->bindParam(':ekran', $this->ekran);
        $stmt->bindParam(':ekran_opis', $this->ekran_opis);
        $stmt->bindParam(':hdd1', $this->hdd1);
        $stmt->bindParam(':hdd1_opis', $this->hdd1_opis);
        $stmt->bindParam(':hdd2', $this->hdd2);
        $stmt->bindParam(':hdd2_opis', $this->hdd2_opis);
        $stmt->bindParam(':os', $this->os);
        $stmt->bindParam(':slob_opis', $this->slob_opis);
        $stmt->bindParam(':lokacija', $this->lokacija);
        $stmt->bindParam(':garancija', $this->garancija);
        $stmt->bindParam(':user_id', $this->user_id);


        if ($stmt->execute()) {
            return true;
        }
        //ako postoji greska ispisuje je
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    public function update()
    {

        $query = 'UPDATE ' . $this->table . '
        SET                           
          naziv= :naziv, 
          cena= :cena, 
          slika= :slika, 
          cpu= :cpu, 
          cpu_opis= :cpu_opis, 
          ram= :ram, 
          tip_rama=  :tip_rama, 
          gpu= :gpu, 
          gpu_opis= :gpu_opis, 
          ekran= :ekran, 
          ekran_opis= :ekran_opis, 
          hdd1= :hdd1, 
          hdd1_opis=:hdd1_opis, 
          hdd2= :hdd2, 
          hdd2_opis=:hdd2_opis, 
          os=:os, 
          slob_opis=:slob_opis, 
          lokacija= :lokacija, 
          garancija= :garancija, 
          user_id= :user_id
         WHERE 
          oglas_id= :oglas_id';

        $stmt = $this->conn->prepare($query);

        //"cistimo unos", skidamo html tagove  
        $this->oglas_id = htmlspecialchars(strip_tags($this->oglas_id));
        $this->naziv = htmlspecialchars(strip_tags($this->naziv));
        $this->cena = htmlspecialchars(strip_tags($this->cena));
        $this->slika = htmlspecialchars(strip_tags($this->slika));
        $this->cpu = htmlspecialchars(strip_tags($this->cpu));
        $this->cpu_opis = htmlspecialchars(strip_tags($this->cpu_opis));
        $this->ram = htmlspecialchars(strip_tags($this->ram));
        $this->tip_rama = htmlspecialchars(strip_tags($this->tip_rama));
        $this->gpu = htmlspecialchars(strip_tags($this->gpu));
        $this->gpu_opis = htmlspecialchars(strip_tags($this->gpu_opis));
        $this->ekran = htmlspecialchars(strip_tags($this->ekran));
        $this->ekran_opis = htmlspecialchars(strip_tags($this->ekran_opis));
        $this->hdd1 = htmlspecialchars(strip_tags($this->hdd1));
        $this->hdd1_opis = htmlspecialchars(strip_tags($this->hdd1_opis));
        $this->hdd2 = htmlspecialchars(strip_tags($this->hdd2));
        $this->hdd2_opis = htmlspecialchars(strip_tags($this->hdd2_opis));
        $this->os = htmlspecialchars(strip_tags($this->os));
        $this->slob_opis = htmlspecialchars(strip_tags($this->slob_opis));
        $this->lokacija = htmlspecialchars(strip_tags($this->lokacija));
        $this->garancija = htmlspecialchars(strip_tags($this->garancija));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));


        //povezijemo podatke sa query 
        $stmt->bindParam(':oglas_id', $this->oglas_id);
        $stmt->bindParam(':naziv', $this->naziv);
        $stmt->bindParam(':cena', $this->cena);
        $stmt->bindParam(':slika', $this->slika);
        $stmt->bindParam(':cpu', $this->cpu);
        $stmt->bindParam(':cpu_opis', $this->cpu_opis);
        $stmt->bindParam(':ram', $this->ram);
        $stmt->bindParam(':tip_rama', $this->tip_rama);
        $stmt->bindParam(':gpu', $this->gpu);
        $stmt->bindParam(':gpu_opis', $this->gpu_opis);
        $stmt->bindParam(':ekran', $this->ekran);
        $stmt->bindParam(':ekran_opis', $this->ekran_opis);
        $stmt->bindParam(':hdd1', $this->hdd1);
        $stmt->bindParam(':hdd1_opis', $this->hdd1_opis);
        $stmt->bindParam(':hdd2', $this->hdd2);
        $stmt->bindParam(':hdd2_opis', $this->hdd2_opis);
        $stmt->bindParam(':os', $this->os);
        $stmt->bindParam(':slob_opis', $this->slob_opis);
        $stmt->bindParam(':lokacija', $this->lokacija);
        $stmt->bindParam(':garancija', $this->garancija);
        $stmt->bindParam(':user_id', $this->user_id);

        if ($stmt->execute()) {
            return true;
        }
        //ako postoji greska ispisuje je
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    public function delete(){

        $query = 'DELETE FROM ' . $this->table . ' WHERE oglas_id = :oglas_id';

        $stmt = $this->conn->prepare($query);

        $this->oglas_id = htmlspecialchars(strip_tags($this->oglas_id));

        $stmt->bindParam(':oglas_id', $this->oglas_id);

        if ($stmt->execute()) {
            return true;
        }
        //ako postoji greska ispisuje je
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}
