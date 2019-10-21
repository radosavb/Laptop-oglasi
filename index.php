<!DOCTYPE html>
<html>

<head>
    <?php
    //Ubacuje css, bootstrap i ostalo    
    include_once './includes/head.php';
    //ukljucen ekran za učitavanje
    include_once './includes/loader.php';
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
                    include_once 'includes/sidebar.php';
                    ?>
                </div>

                <!-- main -->
                <div class="col-md-8">
                    <div class="row d-flex justify-content-center">

                        <?php
                        
                        include_once 'includes/search.php';
                        ?>

                    </div>
                </div>
                <!-- Side bar right -->
                <div class="col-md-2 bg-light text-center">
                    <button id="unos" class="btn btn-lg text-center my-4" type="button">OBJAVI OGLAS</button>
                    <div id="poruka"></div>
                </div>
            </div>
        </div>

    </main>
    <?php
    include_once './includes/footer.php';
    ?>
</body>

</html>