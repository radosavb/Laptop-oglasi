<!DOCTYPE html>

<head>
    <?php
    include_once 'head.php';
    ?>
</head>


<div class="wrapper">
<!-- Meni za pretragu se na manjim ekranima prikazuje tek kada se klikne na strelicu -->
    <nav id="sidebar" class="nanvbar navbar-expand-md">

        <div class="sidebar-header text-center py-3">
            <h4>Napredna pretraga</h4>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#side_menu">
            <span id="collaps_menu" class="fa fa-angle-double-down text-white"><span>
        </button>

        <div id="side_menu" class="collapse navbar-collapse">
<!-- Meni je obliku liste koja sadrži formular, koji klikom na submit GET metodom šalje zahtev search.php fajlu. Lista se generiše iz nizova koji sadrže dozvoljene vrednosti koje mogu biti unete u bazu podataka -->
            <ul class="list-unstyled components">
                <form action='index.php' method='GET'>
<!-- Search bar za pretagu prema nazivu laptopa. Ima posebno submit dugme -->
                    <li class="px-2">
                        <legend class="h6">Po nazivu</legend>
                        <div class="input-group search-panel pb-3">
                            <input id="pretraga" name="pretraga" type="text" class="form-control" placeholder="Naziv laptopa">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><span class="fa fa-search text-white"></span></button>
                            </span>
                        </div>
                    </li>
<!-- Search bar za pretagu po rasponu cene laptopa -->
                    <li class="px-2 ">
                        <div class="filter-content">
                            <legend class="h6 mb-0">Po ceni</legend>
                            <div class="form-row">
                                <div class="form-group col-sm-6 text-center">
                                    <label>od</label>
                                    <input type="number" class="form-control" id="min" name="min" placeholder="100">
                                </div>
                                <div class="form-group col-sm-6 text-center">
                                    <label>do</label>
                                    <input type="number" class="form-control" id="max" name="max" placeholder="500">
                                </div>
                            </div>
                        </div>

                    </li>
<!-- Meni za filtriranje prema vrsti procesora -->
                    <li>
                        <!-- Niz sa svim procesorima koji mogu biti uneti u bazu podataka -->
                        <?php $procesori = ['Intel Core i9', 'Intel Core i7', 'Intel Core i5', 'Intel Core i3', 'Intel Core M', 'Intel Pentium', 'Intel Atom', 'Intel Celeron', 'Intel Xeon', 'AMD (četvorojezgarni)', 'AMD (dvojezgarni)']; ?>

                        <a href="#procesorSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Procesor</a>

                        <ul class="collapse list-group" id="procesorSubmenu">
                            <!-- Preko for petlje se ispisuje checkbox element za svaki naziv procesora koji je smešten u niz, tj. koji može biti smesten u bazu -->
                            <?php for ($i = 0; $i < count($procesori); $i++) { ?>

                                <li class="px-3 py-1 list-group-item">
                                    <label class="form-check">
                                        <!-- u name polje sam stavio [] na kraj da bi se napravio niz koji moze da te koristi u foreach -->
                                        <input class="form-check-input" type="checkbox" value="<?php echo $procesori[$i] ?>" name="cpu[]">
                                        <span class="form-check-label"><?php echo $procesori[$i] ?></span>
                                    </label>
                                </li>

                            <?php } ?>

                        </ul>
                    </li>
<!-- Meni za filtriranje po količini RAM memorije. Princip za ispis checkboxa je isti kao i za procesore -->
                    <li>
                        <?php $ram_memorija = ['1', '2', '4', '6', '8', '12', '16', '>16']; ?>

                        <a href="#ramSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">RAM memorija</a>

                        <ul class="collapse list-group" id="ramSubmenu">

                            <?php for ($i = 0; $i < count($ram_memorija); $i++) { ?>

                                <li class="px-3 py-1 list-group-item">
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?php echo $ram_memorija[$i] ?>" name="ram[]">
                                        <span class="form-check-label"><?php echo $ram_memorija[$i] ?> GB</span>
                                    </label>
                                </li>

                            <?php } ?>

                        </ul>
                    </li>
<!-- Meni za filtriranje prema veličini ekrana. Princip za ispis checkboxa je isti kao i za procesore -->
                    <li>
                        <?php $ekrani = ['12', '14', '15.6', '17.3']; ?>

                        <a href="#ekraniSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Ekrani</a>

                        <ul class="collapse list-group" id="ekraniSubmenu">

                            <?php for ($i = 0; $i < count($ekrani); $i++) { ?>

                                <li class="px-3 py-1 list-group-item">
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?php echo $ekrani[$i] ?>" name="ekran[]">
                                        <span class="form-check-label"><?php echo $ekrani[$i] ?> "</span>
                                    </label>
                                </li>

                            <?php } ?>

                        </ul>
                    </li>
<!-- Meni za filtriranje prema vrsti grafičke kartice. Princip za ispis checkboxa je isti kao i za procesore -->
                    <li>
                        <?php $graficka = ['Integrisana', 'NVidia', 'ATI Radeon']; ?>

                        <a href="#grafickaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Grafička kartica</a>

                        <ul class="collapse list-group" id="grafickaSubmenu">

                            <?php for ($i = 0; $i < count($graficka); $i++) { ?>

                                <li class="px-3 py-1 list-group-item">
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?php echo $graficka[$i] ?>" name="gpu[]">
                                        <span class="form-check-label"><?php echo $graficka[$i] ?></span>
                                    </label>
                                </li>

                            <?php } ?>

                        </ul>

                    </li>
<!-- Meni za filtriranje po količini memorije HDD-a. Princip za ispis checkboxa je isti kao i za procesore -->
                    <li>
                        <?php $hdd = ['nema','128', '256', '512', '1024', '2048']; ?>

                        <a href="#hddSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">HDD</a>

                        <ul class="collapse list-group" id="hddSubmenu">

                            <?php for ($i = 0; $i < count($hdd); $i++) { ?>

                                <li class="px-3 py-1 list-group-item">
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?php echo $hdd[$i] ?>" name="hdd1[]">
                                        <span class="form-check-label"><?php 
                                        if($hdd[$i]!="nema"){
                                            echo $hdd[$i] . " GB";                           
                                        }else{
                                            echo "nema";
                                        }
                                            ?></span>
                                    </label>
                                </li>

                            <?php } ?>

                        </ul>
                    </li>
<!-- Meni za filtriranje po količini memorije SSD-a. Princip za ispis checkboxa je isti kao i za procesore -->
                    <li>
                        <?php $ssd = ['nema','128', '256', '512', '1024']; ?>

                        <a href="#ssdSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">SSD</a>

                        <ul class="collapse list-group" id="ssdSubmenu">

                            <?php for ($i = 0; $i < count($ssd); $i++) { ?>

                                <li class="px-3 py-1 list-group-item">
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?php echo $ssd[$i] ?>" name="hdd2[]">
                                        <span class="form-check-label"><?php 
                                         if($ssd[$i]!="nema"){
                                            echo $ssd[$i] . " GB";                           
                                        }else{
                                            echo "nema";
                                        }
                                            ?></span>
                                    </label>
                                </li>

                            <?php } ?>

                        </ul>
                    </li>
<!-- Meni za filtriranje prema vrsti operativnog sistema. Princip za ispis checkboxa je isti kao i za procesore -->
                    <li>
                        <?php $os = ['Nema', 'Windows', 'Linux']; ?>

                        <a href="#osSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Operativni sistem</a>

                        <ul class="collapse list-group" id="osSubmenu">

                            <?php for ($i = 0; $i < count($os); $i++) { ?>

                                <li class="px-3 py-1 list-group-item">
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?php echo $os[$i] ?>" name="os[]">
                                        <span class="form-check-label"><?php echo $os[$i] ?></span>
                                    </label>
                                </li>

                            <?php } ?>

                        </ul>
                    </li>
                    <div class="text-center">
                        <!-- Ukoliko se klikne na submit dugme fajl search.php vrši pretragu -->
                        <button id="pretraga1" name="pretraga1" class="btn mt-3  text-light" type="submit">Pretraga</button>
                         <!-- Ukoliko se klikne na reset dugme pretraga se poništava (redirektuje se na početnu stranicu) i laptop oglasi se prikazuju po default redosledu (od najnovijeg ka najstarijem) -->                  
                        <button id="reset1" class="btn btn-danger  mt-3 text-light" type="reset"><a href="./index.php">Resetuj pretragu</a></button>
                    </div>

                </form>
            </ul>

        </div>
    </nav>

</div>