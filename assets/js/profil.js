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

    //koristi api/read da ucita sve oglase
    getOglas().then(oglasi => {
        let oglasiTabela = document.getElementById("oglasiTabela");
        oglasi.podaci.forEach(oglas => {
            //ucitava samo oglase gde se user_id slaze sa korisnickim id i ispisuje
            if (oglas.user_id === user_id) {
                oglasiTabela.innerHTML += `<tr data-id="${oglas.oglas_id}">
                <td> <img class="w-100" src="assets/images/${oglas.slika}" alt=""></td>
                <td class="align-middle">${oglas.naziv}</td>
                <td class="align-middle">${oglas.cena}<span> RSD</span></td>
                <td class="align-middle"><a href="read_single_oglas.php?oglas_id=${oglas.oglas_id}">Link</a></td>
                <td class="align-middle"><button data-action = "edit" class="btn btn-warning btn-sm">Promeni</button></td>
                <td class="align-middle"><button data-action = "delete" class="btn btn-danger btn-sm">Obriši</button></td>
            </tr>`
            }
        });
    });
});

async function getUser() {
    const jwt = getCookie();
    const url = "api/korisnici/validate_token.php";
    const data = {
        jwt: jwt
    };
    let param = {
        headers: {
            "content-type": "application/json; charset=UTF-8"
        },
        body: JSON.stringify(data),
        method: "POST"
    };
    const response = await fetch(url, param);
    if (response.status > 400) {
        return;
    }
    const odgovor = await response.json();
    return odgovor;
}

async function getOglas() {
    const url = "api/oglasi/read.php";
    const param = {
        headers: {
            "content-type": "application/json; charset=UTF-8"
        },
        method: "GET"
    };
    const response = await fetch(url, param);
    const odgovor = await response.json();
    return odgovor;
}

async function deleteOGlas(id) {

    const url = "api/oglasi/delete.php";
    const data = {
        oglas_id: id
    };
    const param = {
        headers: {
            "content-type": "application/json; charset=UTF-8"
        },
        body: JSON.stringify(data),
        method: "POST"
    };
    await fetch(url, param);
}

document.getElementById("oglasiTabela").addEventListener("click", function (e) {
    //ako element na koji smo kliknuli ima data-action podesen na delete
    if (e.target.getAttribute("data-action") === "delete") {
        //Starting with the Element itself, the closest() method traverses parents (heading toward the document root) of the Element until it finds a node that matches the provided selectorString. Will return itself or the matching ancestor. If no such element exists, it returns null.
        //sa data-id uzimamo od od tog oglasa        
        const oglasId = e.target.closest("tr").getAttribute("data-id");
        //pozivamo funkciju za brisanje oglasa
        if (confirm("Da li ste sigurni da želite da obrišete oglas?")) {
            deleteOGlas(oglasId);
            location.reload();
        }
    }

    if (e.target.getAttribute("data-action") === "edit") {
        const oglasId = e.target.closest("tr").getAttribute("data-id");

        //Ovo je jedini nacin koji sam nasao da se posalje sa JS POST metodom neki podatak na drugu stranicu i da se otvori ta stranica
        // Kreira se form
        var form = document.createElement("form");
        //dodaje se method i action        
        form.method = "POST";
        form.action = "izmeni_oglas.php";

        // Kreira se input
        var input = document.createElement("input");
        //dodaju se potrebni podaci
        input.type = "text";
        input.name = "oglas_id";
        input.value = oglasId;

        // input se dodaje u form
        form.appendChild(input);

        // form se upisuje na dokument
        document.body.appendChild(form);

        // Salje se form
        form.submit();
    }
});

//izmena korisnickih podataka
document.getElementById("izmeniPodatke").addEventListener("click", function () {
    alert("U izradi :)");
});

document.getElementById("promeniLozinku").addEventListener("click", function () {
    alert("U izradi :)");
});