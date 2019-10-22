let dugme_unos = document.getElementById("unos");
let poruka = document.getElementById("poruka");
let ime_korisnika = document.getElementById("ime_korisnika");
let odjava = document.getElementById("odjava");
dugme_unos.addEventListener('click', function() {
    if (
        ime_korisnika.innerText != ""
    ) {
        document.location.href = 'unos_oglasa.php';
    } else {
        poruka.innerHTML = "<p class='bg-danger text-white p-4' style= 'border-radius:12px;'>Molimo Vas da se <a class='text-light' style='text-shadow: 2px 2px 5px black; font-weight:bold;' href='#login_email'>PRIJAVITE</a> ili <a class='text-light' style='text-shadow: 2px 2px 5px black;font-weight:bold;' href='./register.php'>REGISTRUJETE</a></p>";
    }
});