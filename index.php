<?php
include 'header.php'
?>

<body>
    <main>
        <div class="container-fluid">

            <div class="row py-2">
                <!-- side bar left -->
                <div class="col-md-2  bg-light">
                    <h4 class="h4">Napredna pretraga</h4>
                    <form>
                        <div class="form-group">
                            <label for="procesor">Procesor</label>
                            <select class="form-control" id="procesor" name="procesor">
                                <option value="">Nebitno</option>
                                <option>AMD</option>
                                <option>Intel</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ram">RAM</label>
                            <select class="form-control" id="ram" name="ram">
                                <option value="">Nebitno</option>
                                <option value="4">4 GB</option>
                                <option value="6">6 GB</option>
                                <option value="8">8 GB</option>
                                <option value="12">12 GB</option>
                                <option value="16">16 GB</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="graficka">Grafička</label>
                            <select class="form-control" id="graficka" name="graficka">
                                <option value="">Nebitno</option>
                                <option value="integrisana">Integrisana</option>
                                <option value="nvidia">Nvidia</option>
                                <option value="amd">AMD</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hdd">HDD</label>
                            <select class="form-control" id="hdd" name="hdd">
                                <option value="">Nebitno</option>
                                <option value="500">500 GB</option>
                                <option value="1000">1 TB</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ssd">SSD</label>
                            <select class="form-control" id="ssd" name="ssd">
                                <option value="">Nebitno</option>
                                <option value="128">128 GB</option>
                                <option value="256">256 GB</option>
                                <option value="512">512 GB</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary px-4">Traži</button>
                        </div>
                    </form>
                </div>
                <!-- main -->
                <div class="col-md-8">
                    <div class="row">
                        <div class="card col-xl-3 col-lg-4 col-sm-6 mb-2">
                            <img class="card-img-top" src="assets/images/dell.jfif">
                            <div class="card-body">
                                <h5 class="card-title">DELL Inspiron</h5>
                                <table>
                                    <tr>
                                        <td>Cena:</td>
                                        <td class="text-danger">200e</td>
                                    </tr>
                                    <tr>
                                        <td>Ocena: </td>
                                        <td class="w-100">
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">4/5</div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <p class="card-text">Quick sample text to create the card title and make up the body of the
                                    card's content.</p>
                                <a href="#" class="btn btn-primary w-100">Detaljnije</a>
                            </div>
                        </div>
                        <div class="card col-xl-3 col-lg-4 col-sm-6 mb-2">
                            <img class="card-img-top" src="assets/images/dell1.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">DELL Inspiron</h5>
                                <table>
                                    <tr>
                                        <td>Cena:</td>
                                        <td class="text-danger">250e</td>
                                    </tr>
                                    <tr>
                                        <td>Ocena: </td>
                                        <td style="width: 100%;">
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">2/5</div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <p class="card-text">Quick sample text to create the card title and make up the body of the
                                    card's content.</p>
                                <a href="#" class="btn btn-primary w-100">Detaljnije</a>
                            </div>
                        </div>
                        <div class="card col-xl-3 col-lg-4 col-sm-6 mb-2">
                            <img class="card-img-top" src="assets/images/dell2.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">DELL Inspiron</h5>
                                <table>
                                    <tr>
                                        <td>Cena:</td>
                                        <td class="text-danger">300e</td>
                                    </tr>
                                    <tr>
                                        <td>Ocena: </td>
                                        <td style="width: 100%;">
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">4/5</div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <p class="card-text">Quick sample text to create the card title and make up the body of the
                                    card's content.</p>
                                <a href="#" class="btn btn-primary w-100">Detaljnije</a>
                            </div>
                        </div>
                        <div class="card col-xl-3 col-lg-4 col-sm-6 mb-2">
                            <img class="card-img-top" src="assets/images/len.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Lenovo Thinkpad</h5>
                                <table>
                                    <tr>
                                        <td>Cena:</td>
                                        <td class="text-danger">150e</td>
                                    </tr>
                                    <tr>
                                        <td>Ocena: </td>
                                        <td style="width: 100%;">
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">1/5</div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <p class="card-text">Quick sample text to create the card title and make up the body of the
                                    card's content.</p>
                                <a href="#" class="btn btn-primary w-100">Detaljnije</a>
                            </div>
                        </div>
                        <div class="card col-xl-3 col-lg-4 col-sm-6 mb-2">
                            <img class="card-img-top" src="assets/images/dell.jfif">
                            <div class="card-body">
                                <h5 class="card-title">DELL Inspiron</h5>
                                <table>
                                    <tr>
                                        <td>Cena:</td>
                                        <td class="text-danger">200e</td>
                                    </tr>
                                    <tr>
                                        <td>Ocena: </td>
                                        <td class="w-100">
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">4/5</div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <p class="card-text">Quick sample text to create the card title and make up the body of the
                                    card's content.</p>
                                <a href="#" class="btn btn-primary w-100">Detaljnije</a>
                            </div>
                        </div>
                        <div class="card col-xl-3 col-lg-4 col-sm-6 mb-2">
                            <img class="card-img-top" src="assets/images/dell1.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">DELL Inspiron</h5>
                                <table>
                                    <tr>
                                        <td>Cena:</td>
                                        <td class="text-danger">250e</td>
                                    </tr>
                                    <tr>
                                        <td>Ocena: </td>
                                        <td style="width: 100%;">
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">2/5</div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <p class="card-text">Quick sample text to create the card title and make up the body of the
                                    card's content.</p>
                                <a href="#" class="btn btn-primary w-100">Detaljnije</a>
                            </div>
                        </div>
                        <div class="card col-xl-3 col-lg-4 col-sm-6 mb-2">
                            <img class="card-img-top" src="assets/images/dell2.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">DELL Inspiron</h5>
                                <table>
                                    <tr>
                                        <td>Cena:</td>
                                        <td class="text-danger">300e</td>
                                    </tr>
                                    <tr>
                                        <td>Ocena: </td>
                                        <td style="width: 100%;">
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">4/5</div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <p class="card-text">Quick sample text to create the card title and make up the body of the
                                    card's content.</p>
                                <a href="#" class="btn btn-primary w-100">Detaljnije</a>
                            </div>
                        </div>
                        <div class="card col-xl-3 col-lg-4 col-sm-6 mb-2">
                            <img class="card-img-top" src="assets/images/len.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Lenovo Thinkpad</h5>
                                <table>
                                    <tr>
                                        <td>Cena:</td>
                                        <td class="text-danger">150e</td>
                                    </tr>
                                    <tr>
                                        <td>Ocena: </td>
                                        <td style="width: 100%;">
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">1/5</div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <p class="card-text">Quick sample text to create the card title and make up the body of the
                                    card's content.</p>
                                <a href="#" class="btn btn-primary w-100">Detaljnije</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side bar right -->
                <div class="col-md-2 bg-light text-center">
                    <button class="btn btn-lg btn-danger text-center" type="submit">OBJAVI OGLAS</button>

                </div>
            </div>
        </div>
        </div>
        </div>
    </main>


    <footer>
        <!-- TO DO -->
    </footer>

</body>


</html>