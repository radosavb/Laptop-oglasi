<head>
    <?php
    include_once './includes/head.php';
    ?>
    <title>Laptopdrom | Unos oglasa</title>
</head>


<?php
include_once './includes/header.php';
?>
<div class="container">
<!-- Formular za unos oglasa. Radi sigurnosti se koristi POST metod -->
    <form id="unos_oglasa" action="create_oglas.php" method="post" enctype="multipart/form-data" class="bg-light">
        <fieldset class="p-3 my-3">
            <legend>Unos oglasa <span class="text-info info">Polja obeležena zvezdicom su obavezna</span></legend>
            
            <div class="form-row mb-3">
                <div class="form-group col-md-6">
                    <label for="naziv" class="">Naziv laptopa<span class="obavezna_polja"> *</span></label>
                    <input type="text" id="naziv" name="naziv" class="form-control" placeholder="npr. Dell Inspiron 15 3580">
                </div>
                <div class="form-group col-md-3">
                    <label for="dodaj_sliku">Dodaj sliku:</label>
                    <input type="file" id="dodaj_sliku" name="dodaj_sliku" class="form-control-file">
                </div>
                <div class="form-group col-md-2 col-6">
                    <label for="cena" class="">Cena:<span class="obavezna_polja"> *</span></label>
                    <input type="int" id="cena" name="cena" class="form-control">
                </div>
                <div class="form-group col-md-1 col-6">
                    <label for="valuta">Valuta:</label>
                    <input readonly value="RSD" id="valuta" name="valuta" class="form-control">
                </div>
            </div>

            <div class="form-row mb-3">
<!-- Unos podataka u obavezna polja se najčesće vrši preko select elementa što obezbeđuje lakšu pretragu i filtriranje -->
                <div class="form-group col-lg-3 col-md-6">
                    <label for="cpu">Procesor<span class="obavezna_polja"> *</span></label>
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
                    <label for="ram">RAM<span class="obavezna_polja"> *</span></label>
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
                    <label for="ekran">Ekran<span class="obavezna_polja"> *</span></label>
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
                    <label for="gpu">Grafička kartica:<span class="obavezna_polja"> *</span></label>
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
                    <label for="hdd1">HDD<span class="obavezna_polja"> *</span></label>
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
                    <label for="hdd2">SSD<span class="obavezna_polja"> *</span></label>
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
                    <label for="os">Operativni sistem<span class="obavezna_polja"> *</span></label>
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
                        <!-- Polje za unos vrednosti garancije u mesecima se otvara jedino ako je čekirano polje iznad njega -->
                        <input id="garancija" name="garancija" class="form-control" type="int" placeholder="u mesecima" disabled="disabled">
                    </div>
                    <small class="info text-info">*Ukoliko je laptop još uvek pod garancijom čekirajte kvadratić</small>
                </div>

                <div class="form-group col-lg-6 col-md-12">
                    <label for="slob_opis">Slobodan opis laptopa</label>
                    <textarea class="form-control" id="slob_opis" name="slob_opis" cols="30" rows="5"></textarea>
                    <small class="info text-info">*Što detaljnije opišite stanje laptopa koji oglašavate</small>
                </div>

            </div>

            <div id="pr" class="form-row mb-3">

                <div class="form-group col-md-6">
                    <label for="lokacija">Lokacija<span class="obavezna_polja"> *</span></label>
                    <input class="form-control" type="text" id="lokacija" name="lokacija" placeholder="npr. Beograd, Zvezdara">
                </div>


            </div>

            <div class="text-danger font-italic pb-3" id="greska_ispis"></div>
            <div class="row d-flex justify-content-center pb-5">
                <!-- Klikom na submit podaci iz formulara se šalju fajlu create_oglas.php koji pre upisivanja u bazu vrsi proveru i sanitaciju unetih podataka -->
                <input class="btn btn-primary w-25 mx-2" type="submit" id="predaj_oglas" name="predaj_oglas" value="Predaj oglas">
                <!-- Klikom na sledeće dugme uneti podaci se brišu -->
                <input class="btn btn-danger w-25" type="reset" id="reset_oglas" name="reset_oglas" value="Obrisi podatke">
            </div>

        </fieldset>
    </form>
</div>
<!-- script za validaciju unetih podataka. Proverava da li su uneti obavezni elementi i njihov opseg -->
<script src="./assets/js/validation_script.js"></script>

<?php
include_once 'includes/footer.php';
?>