getUser().then(response => {
    //ako je JWT token pogresan ili korisnik nije ulogovan
    if (response === undefined) {
        document.getElementById("nisteUlogovani").style.display = "block";
        document.getElementById("korisnickiProfil").style.display = "none";
        return;
    }
    const ime = document.getElementById("ime");
    const prezime = document.getElementById("prezime");
    const email = document.getElementById("email");
    const tel = document.getElementById("tel");
    const adresa = document.getElementById("adresa");
    document.getElementById("nisteUlogovani").style.display = "none";
    document.getElementById("korisnickiProfil").style.display = "flex";

    //upisuje podatke od JSON odgovora u polja
    ime.value = response.data.ime;
    prezime.value = response.data.prezime;
    email.value = response.data.email;
    tel.value = 0 + response.data.tel;
    adresa.value = response.data.adresa;
    const user_id = response.data.user_id;
    console.log(response);

    //koristi api/read da ucita sve oglase
    getOglas().then(oglasi => {
        let oglasiTabela = document.getElementById("oglasiTabela");
        oglasi.podaci.forEach(oglas => {
            //ucitava samo oglase gde se user_id slaze sa korisnickim id i ispisuje
            if (oglas.user_id === user_id) {
                oglasiTabela.innerHTML += `<tr>
                <td> <img style="width:100%" src="assets/images/${oglas.slika}" alt=""></td>
                <td class="align-middle">${oglas.naziv}</td>
                <td class="align-middle">${oglas.cena}<span> RSD</span></td>
                <td class="align-middle"><a href="read_single_oglas.php?oglas_id=${oglas.oglas_id}">Link</a></td>
            </tr>`
            }
        });
    });
});

async function getUser() {
    const jwt = getCookie();
    const url = "api/korisnici/validate_token.php";
    const dataJWT = {
        jwt: jwt
    };
    const paramJWT = {
        headers: {
            "content-type": "application/json; charset=UTF-8"
        },
        body: JSON.stringify(dataJWT),
        method: "POST"
    };
    const response = await fetch(url, paramJWT);
    if (response.status > 400) {
        return;
    }
    const odgovor = await response.json();
    return odgovor;
}

async function getOglas() {
    const url = "api/oglasi/read.php";
    const paramJWT = {
        headers: {
            "content-type": "application/json; charset=UTF-8"
        },
        method: "GET"
    };
    const response = await fetch(url, paramJWT);
    const odgovor = await response.json();
    return odgovor;
}

//izmena korisnickih podataka
document.getElementById("izmeniPodatke").addEventListener("click", function(){
    alert("U izradi :)");
});

document.getElementById("promeniLozinku").addEventListener("click", function(){
    alert("U izradi :)");
});