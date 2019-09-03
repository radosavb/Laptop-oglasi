<head>
    <?php
    include('head.php');
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
    </style>
</head>


    <?php
        include('header.php');
        ?>
        <div class="container bg-light text-dark py-3 my-3">
            <div class="row">
                <h2 class="px-3"></h2>
            </div>

            <form action="" method="" class="">
                <fieldset>
                    <legend>Unos oglasa</legend>
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="naziv" class="">Naziv laptopa</label>
                            <input type="text" id="naziv" class="form-control" placeholder="npr. Dell Inspiron 15 3580">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="dodaj_sliku">Dodaj sliku:</label>
                            <input type="file" id="dodaj_sliku" class="form-control-file">
                        </div>
                        <div class="form-group col-md-2 col-6">
                            <label for="cena" class="">Cena:</label>
                            <input type="int" id="cena" class="form-control">
                        </div>
                        <div class="form-group col-md-1 col-6">
                            <label for="valuta">Valuta:</label>
                            <select id="valuta" class="form-control">
                                <option>€</option>
                                <option>RSD</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row mb-3">

                        <div class="form-group col-lg-3 col-md-6">
                            <label for="cpu">Procesor</label>
                            <select id="cpu" class="form-control">
                                <option value="">---</option>
                                <option value="Intel Core i9 (osmojezgarni)">Intel Core i9 (osmojezgarni)</option>
                                <option value="Intel Core i9 (šestojezgarni)">Intel Core i9 (šestojezgarni)</option>
                                <option value="Intel Core i7 (šestojezgarni)">Intel Core i7 (šestojezgarni)</option>
                                <option value="Intel Core i7 (četvorojezgarni)">Intel Core i7 (četvorojezgarni)</option>
                                <option value="Intel Core i7 (dvojezgarni)">Intel Core i7 (dvojezgarni)</option>
                                <option value="Intel Core i5 (četvorojezgarni)">Intel Core i5 (četvorojezgarni)</option>
                                <option value="Intel Core i5 (dvojezgarni)">Intel Core i5 (dvojezgarni)</option>
                                <option value="Intel Core i3 (dvojezgarni)">Intel Core i3 (dvojezgarni)</option>
                                <option value="Intel Core M (dvojezgarni)">Intel Core M (dvojezgarni)</option>
                                <option value="Intel Pentium (četvorojezgarni)">Intel Pentium (četvorojezgarni)</option>
                                <option value="Intel Pentium (dvojezgarni)">Intel Pentium (dvojezgarni)</option>
                                <option value="Intel Celeron (četvorojezgarni)">Intel Celeron (četvorojezgarni)</option>
                                <option value="Intel Celeron (dvojezgarni)">Intel Celeron (dvojezgarni)</option>
                                <option value="Intel Xeon">Intel Xeon</option>
                                <option value="AMD (cetvorojezgarni)">AMD (cetvorojezgarni)</option>
                                <option value="AMD (dvojezgarni)">AMD (dvojezgarni)</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-3 col-md-6">
                            <label for="cpu1">Opis procesora</label>
                            <input class="form-control" type="text" id="cpu1" placeholder="npr. 1.8Ghz, 4MB cache">
                        </div>

                        <div class="form-group col-lg-3 col-md-6">
                            <label for="ram">RAM</label>
                            <select id="ram" class="form-control">
                                <option value="">---</option>
                                <option value="1 GB">1 GB</option>
                                <option value="2 GB">2 GB</option>
                                <option value="4 GB">4 GB</option>
                                <option value="6 GB">6 GB</option>
                                <option value="8 GB">8 GB</option>
                                <option value="12 GB">12 GB</option>
                                <option value="16 GB">16 GB</option>
                                <option value=">16 GB">više od 16 GB</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-3 col-md-6">
                            <label for="ram1">Opis RAM memorije</label>
                            <input class="form-control" type="text" id="ram1" placeholder="npr. 2GB + 4GB DDR 4">
                        </div>

                    </div>

                    <div class="form-row mb-3">

                        <div class="form-group col-lg-3 col-md-6">
                            <label for="ekran">Ekran</label>
                            <select id="ekran" class="form-control">
                                <option value="">---</option>
                                <option value="12">12"</option>
                                <option value="14">14"</option>
                                <option value="15.6">15.5"</option>
                                <option value="17.3">17.3"</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3 col-md-6">
                            <label for="ekran1">Opis ekrana</label>
                            <input class="form-control" type="text" id="ekran1" placeholder="npr. matt IPS ACER antiglare">
                        </div>
                        <div class="form-group col-lg-3 col-md-6">
                            <label for="gpu">Grafička kartica:</label>
                            <select id="gpu" class="form-control">
                                <option value="">---</option>
                                <option value="Integrisana">Integrisana</option>
                                <option value="NVidia">NVidia</option>
                                <option value="ATI Radeon">ATI Radeon</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-3 col-md-6">
                            <label for="gpu1">Opis GPU</label>
                            <input class="form-control" type="text" id="gpu1" placeholder="npr. NVidia GTX 1050">
                        </div>

                    </div>

                    <div class="form-row mb-3">

                        <div class="form-group col-lg-3 col-md-6">
                            <label for="hdd">HDD</label>
                            <select id="hdd" class="form-control">
                                <option value="">---</option>
                                <option value="HDD 112 GB">HDD 112 GB</option>
                                <option value="HDD 256 GB">HDD 256 GB</option>
                                <option value="HDD 512 GB">HDD 512 GB</option>
                                <option value="HDD 1 TB">HDD 1 TB</option>
                                <option value="HDD 2 TB">HDD 2 TB</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3 col-md-6">
                            <label for="hdd1">Opis HDD</label>
                            <input class="form-control" type="text" id="hdd1" placeholder="5400 obrtaja/min.">
                        </div>

                        <div class="form-group col-lg-3 col-md-6">
                            <label for="ssd">SSD</label>
                            <select id="ssd" class="form-control">
                                <option value="">---</option>
                                <option value="SSD 112 GB">SSD 112 GB</option>
                                <option value="SSD 256 GB">SSD 256 GB</option>
                                <option value="SSD 512 GB">SSD 512 GB</option>
                                <option value="SSD 1 TB">SSD 1 TB</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-3 col-md-6">
                            <label for="sdd1">Opis SDD</label>
                            <input class="form-control" type="text" id="ssd1" placeholder="npr. TOSHIBA NVMe">
                        </div>

                    </div>
                    <div class="form-row mb-3">

                        <div class="form-group col-lg-3 col-md-6">
                            <label for="os">Operativni sistem</label>
                            <select id="os" class="form-control">
                                <option value="Nema">Nema</option>
                                <option value="Windows">Windows</option>
                                <option value="Linux">Linux</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-3 col-md-6">
                            <label for="grupa">Garancija</label>
                            <div id="grupa" class="form-check d-inline">
                                <input class="form-check-input" type="checkbox" id="garancija" value="ima_garanciju">
                                <input id="meseci" class="form-control" type="int" placeholder="u mesecima">
                            </div>
                            <small>*Ukoliko je laptop još uvek pod garancijom čekirajte kvadratić</small>
                        </div>

                        <div class="form-group col-lg-6 col-md-12">
                            <label for="opis">Slobodan opis laptopa</label>
                            <textarea class="form-control" id="opis" cols="30" rows="5"></textarea>
                            <small>*Što detaljnije opišite stanje laptopa koji oglašavate</small>
                        </div>

                    </div>

                    <div class="row d-flex justify-content-center pb-5">
                        <input class="btn btn-primary w-25" type="submit" value="Predaj oglas">
                    </div>

                </fieldset>
            </form>
        </div>
<?php
include ('footer.php');
?>