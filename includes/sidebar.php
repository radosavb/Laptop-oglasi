<head>
    <?php
    include_once('./includes/head.php');
    ?>
        <title>Sidebar</title>
        <style>
            #sidebar a,
            #sidebar a:hover,
            #sidebar a:focus {
                color: inherit;
                text-decoration: none;
                transition: all 0.3s;
            }  

            #sidebar .wrapper {
                display: flex;
                width: 100%;
                align-items: stretch;
            }
            
            #sidebar {
                width: 100%;
                background: rgb(29, 100, 158);
                color: #fff;
                transition: all 0.3s;
            }

            #sidebar .sidebar-header {
                padding: 15px;
                background: rgb(1, 58, 105);
            }
            
            #sidebar ul.components {
                padding: 20px 0;
            }
            
            #sidebar ul li a {
                padding: 10px;
                font-size: 1.1em;
                display: block;
            }
            
            #sidebar ul li a:hover {
                color: rgb(1, 58, 105);
                background: #edf1fe;
            }
            
            #sidebar a[data-toggle="collapse"] {
                position: relative;
            }
            
            #sidebar .dropdown-toggle::after {
                display: block;
                position: absolute;
                top: 50%;
                right: 20px;
                transform: translateY(-50%);
            }
            
            #sidebar ul ul {
                background: #f7fcfe;
                color: #000034;
            }
            #sidebar ul ul li:hover{
                background: #edf1fe;
            }
            #sidebar ul li label{
                font-size: 13px;
            }
        </style>
</head>


<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header text-center">
            <h4>Napredna pretraga</h4>
        </div>

        <ul class="list-unstyled components">

            <li class="px-2">
                <legend class="h6">Po nazivu</legend>
                <div class="input-group search-panel pb-3">
                    <input id="pretraga" name="pretraga" type="text" class="form-control" placeholder="Naziv laptopa">
                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><span class="fa fa-search text-white"></span></button>
                    </span>
                </div>
            </li>

            <li class="px-2">
                <div class="filter-content">
                    <legend class="h6 mb-0">Po ceni</legend>
                    <div class="form-row">
                        <div class="form-group col-sm-6 text-center">
                            <label>od</label>
                            <input type="number" class="form-control" id="min" name="min" placeholder="100">
                        </div>
                        <div class="form-group col-sm-6 text-center">
                            <label>do</label>
                            <input type="number" class="form-control" id="max" name="max" placeholder="200">
                        </div>
                    </div>
                </div>
            </li>

            <li>
                <a href="#procesorSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Procesor</a>
                <form>
                    <ul class="collapse list-unstyled" id="procesorSubmenu">
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="i9-8" name="i9-8">
                                    <span class="form-check-label">
                                    Intel Core i9 (osmojezgarni)
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="i9-6" name="i9-6">
                                    <span class="form-check-label">
                                    Intel Core i9 (šestojezgarni)
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="i7-6" name="i7-6">
                                    <span class="form-check-label">
                                        Intel Core i7 (šestojezgarni)
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="i7-4" name="i7-4">
                                    <span class="form-check-label">
                                    Intel Core i7 (četvorojezgarni)
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="i7-2" name="i7-2">
                                    <span class="form-check-label">
                                    Intel Core i7 (dvojezgarni)
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="i5-4" name="i5-4">
                                    <span class="form-check-label">
                                    Intel Core i5 (četvorojezgarni)
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="i5-2" name="i5-2">
                                    <span class="form-check-label">
                                    Intel Core i5 (dvojezgarni)
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="i3-2" name="i3-2">
                                    <span class="form-check-label">
                                    Intel Core i3 (dvojezgarni)
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="m-2" name="M-2">
                                    <span class="form-check-label">
                                    Intel Core M (dvojezgarni)
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="p-4" name="p-4">
                                    <span class="form-check-label">
                                    Intel Pentium (četvorojezgarni)
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="p-2" name="p-2">
                                    <span class="form-check-label">
                                    Intel Pentium (dvojezgarni)
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="c-4" name="c-4">
                                    <span class="form-check-label">
                                    Intel Celeron (četvorojezgarni)
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="c-2" name="c-2">
                                    <span class="form-check-label">
                                    Intel Celeron (dvojezgarni)
                                    </span>
                                </label>
                                <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="x" name="x">
                                    <span class="form-check-label">
                                    Intel Xeon
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="amd-4" name="amd-4">
                                    <span class="form-check-label">
                                    AMD (cetvorojezgarni)
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="amd-2" name="amd-2">
                                    <span class="form-check-label">
                                    AMD (dvojezgarni)
                                    </span>
                                </label>
                    </ul>
                </form>

            </li>

            <li>
                <a href="#ramSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">RAM memorija</a>
                <form>
                    <ul class="collapse list-unstyled" id="ramSubmenu">
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1 GB" name="1 GB">
                                    <span class="form-check-label">
                                    1 GB
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="2 GB" name="2 GB">
                                    <span class="form-check-label">
                                    2 GB
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="4 GB" name="4 GB">
                                    <span class="form-check-label">
                                        4 GB
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="6 GB" name="6 GB">
                                    <span class="form-check-label">
                                    6 GB
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="8 GB" name="8 GB">
                                    <span class="form-check-label">
                                    8 GB
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="12 GB" name="12 GB">
                                    <span class="form-check-label">
                                    12 GB
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="16 GB" name="16 GB">
                                    <span class="form-check-label">
                                    16 GB
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value=">16 GB" name=">16 GB">
                                    <span class="form-check-label">
                                    Vise od 16 GB
                                    </span>
                                </label>
                        </li>
                    </ul>
                </form>

            </li>

            <li>
                <a href="#ekranSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Ekran</a>
                <form>
                    <ul class="collapse list-unstyled" id="ekranSubmenu">
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="12" name="12">
                                    <span class="form-check-label">
                                    12"
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="14" name="14">
                                    <span class="form-check-label">
                                    14"
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="15.6" name="15.6">
                                    <span class="form-check-label">
                                    15.6"
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="17.3" name="17.3">
                                    <span class="form-check-label">
                                    17.3"
                                    </span>
                                </label>
                        </li>
                    </ul>
                </form>

            </li>

            <li>
                <a href="#grafickaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Grafička kartica</a>
                <form>
                    <ul class="collapse list-unstyled" id="grafickaSubmenu">
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="integrisana" name="integrisana">
                                    <span class="form-check-label">
                                    Integrisana
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="NVidia" name="NVidia">
                                    <span class="form-check-label">
                                    NVidia
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="ATI Radeon" name="ATI Radeon">
                                    <span class="form-check-label">
                                    ATI Radeon
                                    </span>
                                </label>
                        </li>
                    </ul>
                </form>

            </li>

            <li>
                <a href="#hddSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">HDD</a>
                <form>
                    <ul class="collapse list-unstyled" id="hddSubmenu">
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="HDD 124 GB" name="HDD 124 GB">
                                    <span class="form-check-label">
                                    124 GB
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="HDD 256" name="HDD 256">
                                    <span class="form-check-label">
                                    256 GB
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="HDD 512 GB" name="HDD 512 GB">
                                    <span class="form-check-label">
                                    512 GB
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="HDD 1 TB" name="HDD 1 TB">
                                    <span class="form-check-label">
                                    1 TB
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="HDD 2 TB" name="HDD 2 TB">
                                    <span class="form-check-label">
                                    2 TB
                                    </span>
                                </label>
                        </li>
                    </ul>
                </form>

            </li>

            <li>
                <a href="#ssdSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">SSD</a>
                <form>
                    <ul class="collapse list-unstyled" id="ssdSubmenu">
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="SSD 124 GB" name="SSD 124 GB">
                                    <span class="form-check-label">
                                    124 GB
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="SSD 256" name="SSD 256">
                                    <span class="form-check-label">
                                    256 GB
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="SSD 512 GB" name="SSD 512 GB">
                                    <span class="form-check-label">
                                    512 GB
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="SSD 1 TB" name="SSD 1 TB">
                                    <span class="form-check-label">
                                    1 TB
                                    </span>
                                </label>
                        </li>
                    </ul>
                </form>

            </li>
            
            <li>
                <a href="#osSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Operativni sistem</a>
                <form>
                    <ul class="collapse list-unstyled" id="osSubmenu">
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="nema" name="nema">
                                    <span class="form-check-label">
                                    Nema
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Windows" name="Windows">
                                    <span class="form-check-label">
                                    Windows
                                    </span>
                                </label>
                        </li>
                        <li class="pl-3">
                            <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Linux" name="Linux">
                                    <span class="form-check-label">
                                    Linux
                                    </span>
                                </label>
                        </li>
                    </ul>
                </form>

            </li>

        </ul>

    </nav>

</div>
