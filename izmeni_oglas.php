<head>
    <?php

    include_once './includes/head.php';
    // include_once './config/database.php';

    ?>
    <title>Laptopdrom | Izmena oglasa</title>
</head>


<?php
include_once './includes/header.php';
?>
<?php

function oglasPodaci()
{
    $oglas_id = $_POST["oglas_id"];
    $url = isset($_SERVER["HTTPS"]) ? "https://" : "http://";
    $folder = $_SERVER['REQUEST_URI']; //folder i naziv fajla
    $parts = explode('/', $folder);
    $dir = $_SERVER['SERVER_NAME']; //localhost
    //nece da racuna poslednji deo, koju je naziv fajla
    for ($i = 0; $i < count($parts) - 1; $i++) {
        $dir .= $parts[$i] . "/";
    }
    $url .= $dir; //http://localhost/ime foldera/   

    $service_url = $url . 'api/oglasi/read.php?oglas_id=' . $oglas_id;

    $curl = curl_init($service_url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $curl_response = curl_exec($curl);
    curl_close($curl);
    //vraca podatke o trazenom oglasu
    return json_decode($curl_response);
}
//upisujemo tazeni oglas u obliku objekta u $oglas
$oglas = oglasPodaci();
?>

<div class="container">
    <form id="unos_oglasa" action="create_oglas.php" method="post" enctype="multipart/form-data" class="bg-light">
        <fieldset class="p-3 my-3">
            <legend>Izmena oglasa <span class="text-info info">Polja obeležena zvezdicom su obavezna</span></legend>

            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="naziv" class="">Naziv laptopa<span class="obavezna_polja"> *</span></label>
                    <input type="text" id="naziv" name="naziv" class="form-control" value="<?php echo $oglas->naziv ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="dodaj_sliku">Dodaj sliku:</label>
                    <input type="file" id="dodaj_sliku" name="dodaj_sliku" class="form-control-file">
                </div>
                <div class="form-group col-md-2 col-6">
                    <label for="cena" class="">Cena:<span class="obavezna_polja"> *</span></label>
                    <input type="int" id="cena" name="cena" class="form-control" value="<?php echo $oglas->cena ?>">
                </div>
                <div class="form-group col-md-1 col-6">
                    <label for="valuta">Valuta:</label>
                    <input readonly value="RSD" id="valuta" name="valuta" class="form-control">
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-lg-3 col-md-6">
                    <label for="cpu">Procesor<span class="obavezna_polja"> *</span></label>
                    <select id="cpu" name="cpu" class="form-control">
                        <option value="">---</option>
                        <!-- if petlja proverava koja vrednost je izabrana u oglasu i automatski je selektuje -->
                        <option <?php if ($oglas->cpu == 'Intel Core i9') echo "selected" ?>>Intel Core i9</option>
                        <option <?php if ($oglas->cpu == 'Intel Core i7') echo "selected" ?>>Intel Core i7</option>
                        <option <?php if ($oglas->cpu == 'Intel Core i5') echo "selected" ?>>Intel Core i5</option>
                        <option <?php if ($oglas->cpu == 'Intel Core i3') echo "selected" ?>>Intel Core i3</option>
                        <option <?php if ($oglas->cpu == 'Intel Core M') echo "selected" ?>>Intel Core M</option>
                        <option <?php if ($oglas->cpu == 'Intel Pentium') echo "selected" ?>>Intel Pentium</option>
                        <option <?php if ($oglas->cpu == 'Intel Atom') echo "selected" ?>>Intel Atom</option>
                        <option <?php if ($oglas->cpu == 'Intel Celeron') echo "selected" ?>>Intel Celeron</option>
                        <option <?php if ($oglas->cpu == 'Intel Xeon') echo "selected" ?>>Intel Xeon</option>
                        <option <?php if ($oglas->cpu == 'AMD (četvorojezgarni)') echo "selected" ?>>AMD (četvorojezgarni)</option>
                        <option <?php if ($oglas->cpu == 'AMD (dvojezgarni)') echo "selected" ?>>AMD (dvojezgarni)</option>
                    </select>
                </div>

                <div class="form-group col-lg-3 col-md-6">
                    <label for="cpu_opis">Opis procesora</label>
                    <!-- U inpit polja sa php se upisuje vrednost koja se nalazi u oglasu -->
                    <input class="form-control" type="text" id="cpu_opis" name="cpu_opis" value="<?php echo $oglas->cpu_opis ?>">
                </div>

                <div class="form-group col-lg-3 col-md-6">
                    <label for="ram">RAM<span class="obavezna_polja"> *</span></label>
                    <select id="ram" name="ram" class="form-control">
                        <option value="">---</option>
                        <option <?php if ($oglas->ram == '1') echo "selected " ?> value="1">1 GB</option>
                        <option <?php if ($oglas->ram == '2') echo "selected " ?>value="2">2 GB</option>
                        <option <?php if ($oglas->ram == '4') echo "selected " ?>value="4">4 GB</option>
                        <option <?php if ($oglas->ram == '6') echo "selected " ?>value="6">6 GB</option>
                        <option <?php if ($oglas->ram == '8') echo "selected " ?>value="8">8 GB</option>
                        <option <?php if ($oglas->ram == '12') echo "selected " ?>value="12">12 GB</option>
                        <option <?php if ($oglas->ram == '16') echo "selected " ?>value="16">16 GB</option>
                        <option <?php if ($oglas->ram == '>16') echo "selected " ?>value=">16">više od 16 GB</option>
                    </select>
                </div>

                <div class="form-group col-lg-3 col-md-6">
                    <label for="tip_rama">Opis RAM memorije</label>
                    <input class="form-control" type="text" name="tip_rama" id="tip_rama" value="<?php echo $oglas->tip_rama ?>">
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col-lg-3 col-md-6">
                    <label for="ekran">Ekran<span class="obavezna_polja"> *</span></label>
                    <select id="ekran" name="ekran" class="form-control">
                        <option value="">---</option>
                        <option value="12" <?php if ($oglas->ekran == '12') echo "selected " ?>>12"</option>
                        <option value="14" <?php if ($oglas->ekran == '14') echo "selected " ?>>14"</option>
                        <option value="15.6" <?php if ($oglas->ekran == '15.6') echo "selected " ?>>15.6"</option>
                        <option value="17.3" <?php if ($oglas->ekran == '17.3') echo "selected " ?>>17.3"</option>
                    </select>
                </div>
                <div class="form-group col-lg-3 col-md-6">
                    <label for="ekran_opis">Opis ekrana</label>
                    <input class="form-control" type="text" id="ekran_opis" name="ekran_opis" value="<?php echo $oglas->ekran_opis ?>">
                </div>
                <div class="form-group col-lg-3 col-md-6">
                    <label for="gpu">Grafička kartica:<span class="obavezna_polja"> *</span></label>
                    <select id="gpu" name="gpu" class="form-control">
                        <option value="">---</option>
                        <option <?php if ($oglas->gpu == 'Integrisana') echo "selected" ?>>Integrisana</option>
                        <option <?php if ($oglas->gpu == 'NVidia') echo "selected" ?>>NVidia</option>
                        <option <?php if ($oglas->gpu == 'ATI Radeon') echo "selected" ?>>ATI Radeon</option>
                    </select>
                </div>

                <div class="form-group col-lg-3 col-md-6">
                    <label for="gpu_opis">Opis GPU</label>
                    <input class="form-control" type="text" id="gpu_opis" name="gpu_opis" value="<?php echo $oglas->gpu_opis ?>">
                </div>

            </div>

            <div class="form-row mb-3">
                <div class="form-group col-lg-3 col-md-6">
                    <label for="hdd1">HDD<span class="obavezna_polja"> *</span></label>
                    <select id="hdd1" name="hdd1" class="form-control">
                        <option value="">---</option>
                        <option <?php if ($oglas->hdd1 == 'Nema') echo "selected " ?>value="">Nema</option>
                        <option <?php if ($oglas->hdd1 == '128') echo "selected " ?>value="128">HDD 128 GB</option>
                        <option <?php if ($oglas->hdd1 == '256') echo "selected " ?>value="256">HDD 256 GB</option>
                        <option <?php if ($oglas->hdd1 == '512') echo "selected " ?>value="512">HDD 512 GB</option>
                        <option <?php if ($oglas->hdd1 == '1024') echo "selected " ?>value="1024">HDD 1 TB</option>
                        <option <?php if ($oglas->hdd1 == '2048') echo "selected " ?>value="2048">HDD 2 TB</option>
                    </select>
                </div>
                <div class="form-group col-lg-3 col-md-6">
                    <label for="hdd1_opis">Opis HDD</label>
                    <input class="form-control" type="text" id="hdd1_opis" name="hdd1_opis" value="<?php echo $oglas->hdd1_opis ?>">
                </div>

                <div class="form-group col-lg-3 col-md-6">
                    <label for="hdd2">SSD<span class="obavezna_polja"> *</span></label>
                    <select id="hdd2" name="hdd2" class="form-control">
                        <option value="">---</option>
                        <option <?php if ($oglas->hdd2 == 'Nema') echo "selected " ?>value="">Nema</option>
                        <option <?php if ($oglas->hdd2 == '128') echo "selected " ?>value="128">SSD 128 GB</option>
                        <option <?php if ($oglas->hdd2 == '256') echo "selected " ?>value="256">SSD 256 GB</option>
                        <option <?php if ($oglas->hdd2 == '512') echo "selected " ?>value="512">SSD 512 GB</option>
                        <option <?php if ($oglas->hdd2 == '1024') echo "selected " ?>value="1024">SSD 1 TB</option>
                    </select>
                </div>

                <div class="form-group col-lg-3 col-md-6">
                    <label for="hdd2_opis">Opis SDD</label>
                    <input class="form-control" type="text" id="hdd2_opis" name="hdd2_opis" value="<?php echo $oglas->hdd2_opis ?>">
                </div>

            </div>
            <div class="form-row">

                <div class="form-group col-lg-3 col-md-6">
                    <label for="os">Operativni sistem<span class="obavezna_polja"> *</span></label>
                    <select id="os" name="os" class="form-control">
                        <option <?php if ($oglas->os == 'Nema') echo "selected" ?>>Nema</option>
                        <option <?php if ($oglas->os == 'Windows') echo "selected" ?>>Windows</option>
                        <option <?php if ($oglas->os == 'Linux') echo "selected" ?>>Linux</option>
                    </select>
                </div>

                <div class="form-group col-lg-3 col-md-6">
                    <label for="grupa">Garancija</label>
                    <div id="grupa" class="form-check d-inline">
                        <!-- cekira polje ako postoji garancija -->
                        <input class="form-check-input" type="checkbox" id="gar" name="gar" <?php if ($oglas->garancija > 0) echo "checked" ?> onclick="let garancija = document.getElementById('garancija'); 
                        //  u zavisnosti da li je chekbox cekiran ili nije, input polje za broj meseci je iskljuceno ili ukljuceno
                         if(this.checked){garancija.disabled = false; garancija.focus();}else{garancija.disabled = true;}">
                        <input id="garancija" name="garancija" class="form-control" type="int" value="<?php echo $oglas->garancija ?>" <?php if ($oglas->garancija == 0) echo 'disabled="disabled"' ?>>
                    </div>
                    <small class="info text-info">*Ukoliko je laptop još uvek pod garancijom čekirajte kvadratić</small>
                </div>

                <div class="form-group col-lg-6 col-md-12">
                    <label for="slob_opis">Slobodan opis laptopa</label>
                    <textarea class="form-control" id="slob_opis" name="slob_opis" cols="30" rows="5"><?php echo $oglas->slob_opis ?></textarea>
                    <small class="info text-info">*Što detaljnije opišite stanje laptopa koji oglašavate</small>
                </div>
            </div>

            <div id="pr" class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="lokacija">Lokacija<span class="obavezna_polja"> *</span></label>
                    <input class="form-control" type="text" id="lokacija" name="lokacija" value="<?php echo $oglas->lokacija ?>">
                </div>
            </div>

            <div class="row d-flex justify-content-center pb-5">
                <input class="btn btn-success w-25 mx-2" type="button" id="izmeni_oglas" name="izmeni_oglas" value="Izmeni oglas">
                <input class="btn btn-warning w-25 mx-2" type="button" id="odustani" name="odustani" value="Odustani">
            </div>
        </fieldset>
    </form>
</div>

<!-- Nisam stavio ovu skriptu u poseban js fajl jer sadrzi PHP -->
<script>
    document.getElementById("izmeni_oglas").addEventListener("click", function() {
        let oglas_id = "<?php echo $oglas->oglas_id ?>";
        let user_id = "<?php echo $oglas->user_id ?>";
        let slika = "<?php echo $oglas->slika ?>";
        let naziv = document.getElementById('naziv').value;
        let cena = document.getElementById('cena').value;
        let cpu = document.getElementById('cpu').value;
        let cpu_opis = document.getElementById('cpu_opis').value;
        let ram = document.getElementById('ram').value;
        let tip_rama = document.getElementById('tip_rama').value;
        let ekran = document.getElementById('ekran').value;
        let ekran_opis = document.getElementById('ekran_opis').value;
        let gpu = document.getElementById('gpu').value;
        let gpu_opis = document.getElementById('gpu_opis').value;
        let hdd1 = document.getElementById('hdd1').value;
        let hdd1_opis = document.getElementById('hdd1_opis').value;
        let hdd2 = document.getElementById('hdd2').value;
        let hdd2_opis = document.getElementById('hdd2_opis').value;
        let os = document.getElementById('os').value;
        let lokacija = document.getElementById('lokacija').value;
        let garancija = document.getElementById('garancija').value;
        //ako garancija nije podesena stavlja je na 0
        garancija > 0 ? garancija : garancija = 0;
        let slob_opis = document.getElementById('slob_opis').value;
        //funkcija koja salje podatke na nas API i izmenjuje oglas
        async function updateOglas() {
            const url = "api/oglasi/update.php";
            const data = {
                oglas_id: oglas_id,
                naziv: naziv,
                cena: cena,
                slika: slika,
                cpu: cpu,
                cpu_opis: cpu_opis,
                ram: ram,
                tip_rama: tip_rama,
                gpu: gpu,
                gpu_opis: gpu_opis,
                ekran: ekran,
                ekran_opis: ekran_opis,
                hdd1: hdd1,
                hdd1_opis: hdd1_opis,
                hdd2: hdd2,
                hdd2_opis: hdd2_opis,
                os: os,
                slob_opis: slob_opis,
                lokacija: lokacija,
                garancija: garancija,
                user_id: user_id
            };
            let param = {
                headers: {
                    "content-type": "application/json; charset=UTF-8"
                },
                body: JSON.stringify(data),
                method: "PUT"
            };
            const response = await fetch(url, param);
            const odgovor = await response.json();
            return odgovor;
        }

        updateOglas().then(response => {
            //po uspesnoj promeni, ispisuje alert i vara korisnika na profil
            alert(response.message);
            location.href = 'profil.php';
        });
    });
    document.getElementById("odustani").addEventListener("click", function(){
        //ako korisnik odustaje od promene, vraca ga na profilnu stranu
        location.href = 'profil.php';
    });
</script>

<?php
include_once 'includes/footer.php';
?>