<head>
    <?php

    include_once './includes/head.php';
    // include_once './config/database.php';

    ?>
    <title>Unos oglasa</title>
    <style>
        select {
            background: rgb(1, 58, 105) !important;
            color: white !important;
        }

        label {
            font-weight: bold;
        }
        #obavezna_polja{
            color: red;
        }
        #obav{
            font-size: 10px;
            
        }
    </style>
</head>


<?php
include_once './includes/header.php';
?>
<div class="container">
    <form id="unos_oglasa" action="create_oglas.php" method="post" enctype="multipart/form-data" class="bg-light">
        <fieldset class="p-3 my-3">
            <legend>Unos oglasa <span class="text-info" id="obav">Polja obeležena zvezdicom su obavezna</span></legend>
            
            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="naziv" class="">Naziv laptopa<span id="obavezna_polja"> *</span></label>
                    <input type="text" id="naziv" name="naziv" class="form-control" placeholder="npr. Dell Inspiron 15 3580">
                </div>
                <div class="form-group col-md-3">
                    <label for="dodaj_sliku">Dodaj sliku:</label>
                    <input type="file" id="dodaj_sliku" name="dodaj_sliku" class="form-control-file">
                </div>
                <div class="form-group col-md-2 col-6">
                    <label for="cena" class="">Cena:<span id="obavezna_polja"> *</span></label>
                    <input type="int" id="cena" name="cena" class="form-control">
                </div>
                <div class="form-group col-md-1 col-6">
                    <label for="valuta">Valuta:</label>
                    <input type="readonly" value="RSD" id="valuta" name="valuta" class="form-control">
                </div>
            </div>

            <div class="form-row mb-3">

                <div class="form-group col-lg-3 col-md-6">
                    <label for="cpu">Procesor<span id="obavezna_polja"> *</span></label>
                    <select id="cpu" name="cpu" class="form-control">
                        <option value="">---</option>
                        <option value="Intel Core i9">Intel Core i9</option>
                        <option value="Intel Core i7">Intel Core i7</option>
                        <option value="Intel Core i5">Intel Core i5</option>
                        <option value="Intel Core i3">Intel Core i3</option>
                        <option value="Intel Core M">Intel Core M</option>
                        <option value="Intel Pentium">Intel Pentium</option>
                        <option value="Intel Atom">Intel Atom</option>
                        <option value="Intel Celeron ">Intel Celeron</option>
                        <option value="Intel Xeon">Intel Xeon</option>
                        <option value="AMD (cetvorojezgarni)">AMD (četvorojezgarni)</option>
                        <option value="AMD (dvojezgarni)">AMD (dvojezgarni)</option>
                    </select>
                </div>

                <div class="form-group col-lg-3 col-md-6">
                    <label for="cpu_opis">Opis procesora</label>
                    <input class="form-control" type="text" id="cpu_opis" name="cpu_opis" placeholder="npr. 1.8Ghz, 4MB cache">
                </div>

                <div class="form-group col-lg-3 col-md-6">
                    <label for="ram">RAM<span id="obavezna_polja"> *</span></label>
                    <select id="ram" name="ram" class="form-control">
                        <option value="">---</option>
                        <option value="1">1 GB</option>
                        <option value="2">2 GB</option>
                        <option value="4">4 GB</option>
                        <option value="6">6 GB</option>
                        <option value="8">8 GB</option>
                        <option value="12">12 GB</option>
                        <option value="16">16 GB</option>
                        <option value=">16">više od 16 GB</option>
                    </select>
                </div>

                <div class="form-group col-lg-3 col-md-6">
                    <label for="tip_rama">Opis RAM memorije</label>
                    <input class="form-control" type="text" name="tip_rama" id="tip_rama" placeholder="npr. 2GB + 4GB DDR 4">
                </div>

            </div>

            <div class="form-row mb-3">

                <div class="form-group col-lg-3 col-md-6">
                    <label for="ekran">Ekran<span id="obavezna_polja"> *</span></label>
                    <select id="ekran" name="ekran" class="form-control" >
                        <option value="">---</option>
                        <option value="12">12"</option>
                        <option value="14">14"</option>
                        <option value="15.6">15.6"</option>
                        <option value="17.3">17.3"</option>
                    </select>
                </div>
                <div class="form-group col-lg-3 col-md-6">
                    <label for="ekran_opis">Opis ekrana</label>
                    <input class="form-control" type="text" id="ekran_opis" name="ekran_opis" placeholder="npr. matt IPS ACER antiglare">
                </div>
                <div class="form-group col-lg-3 col-md-6">
                    <label for="gpu">Grafička kartica:<span id="obavezna_polja"> *</span></label>
                    <select id="gpu" name="gpu" class="form-control" >
                        <option value="">---</option>
                        <option value="Integrisana">Integrisana</option>
                        <option value="NVidia">NVidia</option>
                        <option value="ATI Radeon">ATI Radeon</option>
                    </select>
                </div>

                <div class="form-group col-lg-3 col-md-6">
                    <label for="gpu_opis">Opis GPU</label>
                    <input class="form-control" type="text" id="gpu_opis" name="gpu_opis" placeholder="npr. NVidia GTX 1050">
                </div>

            </div>

            <div class="form-row mb-3">

                <div class="form-group col-lg-3 col-md-6">
                    <label for="hdd1">HDD<span id="obavezna_polja"> *</span></label>
                    <select id="hdd1" name="hdd1" class="form-control">
                        <option value="">---</option>
                        <option value="nema">Nema</option>
                        <option value="128">HDD 124 GB</option>
                        <option value="256">HDD 256 GB</option>
                        <option value="512">HDD 512 GB</option>
                        <option value="1024">HDD 1 TB</option>
                        <option value="2048">HDD 2 TB</option>
                    </select>
                </div>
                <div class="form-group col-lg-3 col-md-6">
                    <label for="hdd1_opis">Opis HDD</label>
                    <input class="form-control" type="text" id="hdd1_opis" name="hdd1_opis" placeholder="npr. 5400 obrtaja/min.">
                </div>

                <div class="form-group col-lg-3 col-md-6">
                    <label for="hdd2">SSD<span id="obavezna_polja"> *</span></label>
                    <select id="hdd2" name="hdd2" class="form-control" >
                        <option value="">---</option>
                        <option value="nema">Nema</option>
                        <option value="128">SSD 124 GB</option>
                        <option value="256">SSD 256 GB</option>
                        <option value="512">SSD 512 GB</option>
                        <option value="1024">SSD 1 TB</option>
                    </select>
                </div>

                <div class="form-group col-lg-3 col-md-6">
                    <label for="hdd2_opis">Opis SDD</label>
                    <input class="form-control" type="text" id="hdd2_opis" name="hdd2_opis" placeholder="npr. TOSHIBA NVMe">
                </div>

            </div>
            <div class="form-row">

                <div class="form-group col-lg-3 col-md-6">
                    <label for="os">Operativni sistem<span id="obavezna_polja"> *</span></label>
                    <select id="os" name="os" class="form-control" >
                        <option value="Nema">Nema</option>
                        <option value="Windows">Windows</option>
                        <option value="Linux">Linux</option>
                    </select>
                </div>

                <div class="form-group col-lg-3 col-md-6">
                    <label for="grupa">Garancija</label>
                    <div id="grupa" class="form-check d-inline">
                        <input class="form-check-input" type="checkbox" id="gar" name="gar" onclick="let garancija = document.getElementById('garancija'); if(this.checked){garancija.disabled = false; garancija.focus();}else{garancija.disabled = true;}">
                        <input id="garancija" name="garancija" class="form-control" type="int" placeholder="u mesecima" disabled="disabled">
                    </div>
                    <small>*Ukoliko je laptop još uvek pod garancijom čekirajte kvadratić</small>
                </div>

                <div class="form-group col-lg-6 col-md-12">
                    <label for="slob_opis">Slobodan opis laptopa</label>
                    <textarea class="form-control" id="slob_opis" name="slob_opis" cols="30" rows="5"></textarea>
                    <small>*Što detaljnije opišite stanje laptopa koji oglašavate</small>
                </div>

            </div>

            <div id="pr" class="form-row mb-3">

                <div class="form-group col-md-6">
                    <label for="Lokacija">Lokacija<span id="obavezna_polja"> *</span></label>
                    <input class="form-control" type="text" id="Lokacija" name="Lokacija" placeholder="npr. Beograd, Zvezdara">
                </div>


            </div>

            <div class="text-danger font-italic pb-3" id="greska_ispis"></div>

            <div class="row d-flex justify-content-center pb-5">
                <input class="btn btn-primary w-25 mx-2" type="submit" id="predaj_oglas" name="predaj_oglas" value="Predaj oglas">
                <input class="btn btn-danger w-25" type="reset" id="reset_oglas" name="reset_oglas" value="Obrisi podatke">
            </div>

        </fieldset>
    </form>
</div>

<script>
    
    let unos_oglasa = document.getElementById('unos_oglasa');
    let naziv = document.getElementById('naziv');
    let cena = document.getElementById('cena');
    let cpu = document.getElementById('cpu');
    let ram = document.getElementById('ram');
    let ekran = document.getElementById('ekran');
    let gpu = document.getElementById('gpu');
    let hdd = document.getElementById('hdd1');
    let ssd = document.getElementById('hdd2');
    let os = document.getElementById('os');
    let lokacija = document.getElementById('Lokacija');
    let greska_ispis = document.getElementById('greska_ispis');

    unos_oglasa.addEventListener('submit', (e) => {
    let poruke = [];

    if(naziv.value == ""){
        poruke.push("Naziv laptopa je obavezan");
    }
    if(naziv.value.length>20){
        poruke.push("Naziv laptopa je predugačak");
    }
    if(cena.value == ""){
        poruke.push("Cena je obavezna");
    }
    if(cena.value <100 || cena.value>1000000){
        poruke.push("Raspon cene mora biti između 100 i 1000000");
    }
    if(cpu.selectedIndex == 0){
        poruke.push("Odaberite vrstu procesora vašeg laptopa");
    }
    if(ram.selectedIndex == 0){
        poruke.push("Odaberite količinu RAM memorija vašeg laptopa");
    }
    if(ekran.selectedIndex == 0){
        poruke.push("Odaberite dimenziju ekrana vašeg laptopa");
    }
    if(gpu.selectedIndex == 0){
        poruke.push("Odaberite vrstu grafičke kartice vašeg laptopa");
    }
    if(hdd.selectedIndex == 0){
        poruke.push("Odaberite HDD vašeg laptopa. Ukoliko vaš laptop nema HDD odaberite opciju \"nema\"");
    }
    if(ssd.selectedIndex == 0){
        poruke.push("Odaberite SSD vašeg laptopa. Ukoliko vaš laptop nema SSD odaberite opciju \"nema\"");
    }
    if(os.selectedIndex < 0){
        poruke.push("Odaberite operativni sistem vašeg laptopa");
    }
    if(lokacija.value == ""){
        poruke.push("Polje lokacija je obavezno");
    }
    
    if(poruke.length>0){
        e.preventDefault();   
        greska_ispis.innerText = "OGLAS NIJE POSLAT!!! \n" + poruke.join(',\n ');
    }
    
});
    unos_oglasa.onreset = function() {
    var prozor = window.confirm("Podaci će biti obrisani. Da li ste sigurni?");
};
</script>

<?php
include_once 'includes/footer.php';
?>