<head>
    <?php
    include('head.php');
    ?>
    <title>Footer</title>
</head>
<footer class="page-footer container-fluid text-dark" style="border-top:2px solid rgb(107, 107, 107)">
        <div id="bottom_menu" class="row py-3">

            <div class="col-md-4 offset-md-2 d-md-none text-center">
                <ul class="text-light" style="list-style-type:none; text-decoration: none; padding: 20px; ">
                    <li style="display:inline; margin-right: 8px;"><a href="#">Laptopovi</a></li>
                    <li style="display:inline; margin-right: 8px;"><a href="#">O nama</a></li>
                    <li style="display:inline; margin-right: 8px;"><a href="#">Kontakt</a></li>
                    <li style="display:inline; margin-right: 8px;"><a href="#">Pretraga</a></li>
                    <li style="display:inline; margin-right: 8px;"><a href="#">Ostalo</a></li>
                    <li style="display:inline; margin-right: 8px;"><a href="#">Objavi oglas</a></li>
                    <li style="display:inline; margin-right: 8px;"><a href="#">Registruj se</a></li>
                </ul>
            </div>

            <div class="col-md-2 offset-md-2 d-none d-md-block">
                <ul class="" style="list-style-type:none; text-decoration: none; line-height: 25px;">
                    <li><a href="#">Laptopovi</a></li>
                    <li><a href="#">O nama</a></li>
                    <li><a href="#">Kontakt</a></li>
                    <li><a href="#">Pretraga</a></li>
                    <li><a href="#">Ostalo</a></li>
                    <li><a href="#">Objavi oglas</a></li>
                    <li><a href="#">Registruj se</a></li>
                </ul>
            </div>

            <div class="col-md-2 d-none d-md-block">
                <img style="width:160px;" src="assets/images/logo.png">
            </div>

            <div class="col-md-3 offset-md-1 text-monospace">
                © 2019 Copyright:
                <hr>
                LAPTOPDROM
                <hr>
                Ovaj sajt je napravljen kao vežba u okviru projekta IT Obuke i koristi se u nekomercijalne svrhe
            </div>
        </div>

        <div id="social_media" class="row pt-2 pb-5">
            <div class="wrapper col-md-6 offset-md-3 d-flex justify-content-center">
                <a target="_blank" href="your_url_here"><i class="fa fa-3x fa-facebook-square"></i></a>
                <a target="_blank" href="your_url_here"><i class="fa fa-3x fa-twitter-square"></i></a>
                <a target="_blank" href="your_url_here"><i class="fa fa-3x fa-laptop"></i></a>
                <a target="_blank" href="your_url_here"><i class="fa fa-3x fa-github-square"></i></a>
                <a target="_blank" href="your_url_here"><i class="fa fa-3x fa-linkedin"></i></a>
                
            </div>
        </div>

    </footer>

    <script>
    let dugme_unos = document.getElementById("unos");
    dugme_unos.addEventListener('click', function(){
        document.location.href='unos_oglasa.php';
    });
    </script>

</body>

</html>