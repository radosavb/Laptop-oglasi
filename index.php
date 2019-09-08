<!DOCTYPE html>
<html>

<head>
    <?php
    //Ubacuje css, bootstrap i ostalo
    include_once './includes/head.php';
    ?>
        <!-- title nisam ukljucio u head.php jer ce da se menja u zavisnosti od stranice -->
        <title>Laptopdrom | specijalizovan sajt za polovne laptopove</title>

</head>

<body>

    <?php
    include_once './includes/header.php';
    ?>

        <main>
            <div class="container-fluid my-0">

                <div class="row py-2">
                    <div id="side" class="col-md-2 p-0 m-0">
                        <?php
                        include('includes/sidebar.php');
                        ?>
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
                                        <p class="card-text">Quick sample text to create the card title and make up the body of the card's content.</p>
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
                                        <p class="card-text">Quick sample text to create the card title and make up the body of the card's content.</p>
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
                                        <p class="card-text">Quick sample text to create the card title and make up the body of the card's content.</p>
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
                                        <p class="card-text">Quick sample text to create the card title and make up the body of the card's content.</p>
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
                                        <p class="card-text">Quick sample text to create the card title and make up the body of the card's content.</p>
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
                                        <p class="card-text">Quick sample text to create the card title and make up the body of the card's content.</p>
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
                                        <p class="card-text">Quick sample text to create the card title and make up the body of the card's content.</p>
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
                                        <p class="card-text">Quick sample text to create the card title and make up the body of the card's content.</p>
                                        <a href="#" class="btn btn-primary w-100">Detaljnije</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Side bar right -->
                        <div class="col-md-2 bg-light text-center">
                            <button id="unos" class="btn btn-lg btn-danger text-center" type="button">OBJAVI OGLAS</button>

                        </div>
                </div>
            </div>

        </main>
        <?php
    include_once './includes/footer.php';
    ?>
</body>

</html>