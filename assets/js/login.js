document.getElementById("login_submit").addEventListener("click", function (e) {

    let loginEmail = document.getElementById("login_email").value.trim();
    let loginSifra = document.getElementById("login_sifra").value.trim();

    if (loginEmail === "" || loginEmail === null || loginSifra === "" || loginSifra === null) {
        alert("Unesite email i šifru.");
        return;
    }

    //brise cookie
    setCookie("jwt", "", 1);


    //funkcija za login
    async function loginUser() {

        //podaci o korisniku koji hoce da se uloguje
        const url = "api/korisnici/login.php"
        const data = {
            email: loginEmail,
            sifra: loginSifra
        };

        //parametri za slanje serveru
        const param = {
            headers: {
                "content-type": "application/json; charset=UTF-8"
            },
            body: JSON.stringify(data),
            method: "POST"
        };

        //sacekaj odgovor od fetcha i sacuvaj u response
        const response = await fetch(url, param);
        //ako je prijava uspesna, sklanja se form za login
        if (response.status < 400) {
            showProfile();
        }
        //dobijamo odgovor u obliku JSON
        const odgovor = await response.json();
        setCookie("jwt", odgovor.jwt, 1);
        alert(odgovor.message);
    }
    loginUser()
        //kada se zavrsi funkcija loginUser, pokrece se funkcija za uzimanje korisnickog imena i ispisuje se
        .then(() => {
            getUsername()
                //responce je return od getUSername funkcije
                .then(response => {
                    document.getElementById("ime_korisnika").textContent = response;
                    //ovo je dodato jer kad smo okacini na server, ime od profila se ucitavalo tek posle refresha
                    location.reload();
                })
        })
        .catch(error => console.log(error));
});

// funkcija da se podesi cookie
function setCookie(cname, cvalue, exdays) {
    let date = new Date();
    date.setTime(date.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + date.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

//funkcija da se izvuce vrednost postavljenog cookia
function getCookie() {
    let cookie = document.cookie;
    let splitCokie = cookie.split(";");
    for (let i = 0; i < splitCokie.length; i++) {
        if (splitCokie[i].indexOf("jwt=") > -1) {
            let jwt = splitCokie[i].substr(splitCokie[i].indexOf("jwt=") + 4);
            return jwt;
        }
    }
}

async function getUsername() {
    let jwt = getCookie();
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

    const response = await fetch("api/korisnici/validate_token.php", paramJWT);
    const odgovor = await response.json();
    return odgovor.data.ime;

}
//pokazuje ulogovan profil
function showProfile() {
    document.getElementById("login_form").style.display = "none";
    document.getElementById("forgot_pass").style.display = "none";
    document.getElementById("profil").style.display = "block";
}
//pokazuje form za login
function showLogin() {
    document.getElementById("login_form").style.display = "block";
    document.getElementById("forgot_pass").style.display = "block";
    document.getElementById("profil").style.display = "none";
}

//proverava da li je postavljen cookie, ako jeste pokazuje ime korisnika ako nije form za login
if (getCookie() === undefined || getCookie() === "" || getCookie() === "undefined") {
    showLogin();
} else {
    showProfile();
    getUsername()
        //responce je return od getUSername funkcije
        .then(response => {
            document.getElementById("ime_korisnika").textContent = response;
        });
}
//odjavljuje se i brise cookie
document.getElementById("odjava").addEventListener("click", function () {
    if (confirm("Da li ste sigurni da želite da se odjavite?")) {
        setCookie("jwt", "", 1);
        showLogin();
        document.location.href = 'index.php';
    } else return;

});