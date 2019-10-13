document.getElementById("submit").addEventListener("click", function (e) {


  //čuva unose u promenljivim i briše prazna polja (whitespace)
  let ime = document.getElementById("ime").value.trim();
  let prezime = document.getElementById("prezime").value.trim();
  let tel = document.getElementById("tel").value.trim();
  let adresa = document.getElementById("adresa").value.trim();
  let email = document.getElementById("email").value.trim();
  let sifra = document.getElementById("sifra").value.trim();
  let sifra_provera = document.getElementById("sifra_provera").value.trim();
  let uslovi = document.getElementById("uslovi");
  let godine = document.getElementById("godine");

  //polja za greske
  let greska_ime = document.getElementById("greska_ime");
  let greska_prezime = document.getElementById("greska_prezime");
  let greska_tel = document.getElementById("greska_tel");
  let greska_adresa = document.getElementById("greska_adresa");
  let greska_email = document.getElementById("greska_email");
  let greska_sifra = document.getElementById("greska_sifra");
  let greska_uslovi = document.getElementById("greska_uslovi");
  let json_odgovor = document.getElementById("json_odgovor");
  let sveGreske = document.querySelectorAll("small");

  //cisti sve greške na početku, ako su bile ispisane neke.
  sveGreske.forEach(element => {
    element.textContent = "";
  });
  json_odgovor.className = "alert";
  json_odgovor.textContent = "";

  //promenljiva koja čuva informaciju da li postoji neka greška
  let greska = false;

  if (ime === "") {
    greska_ime.textContent = "Ime je obavezno!";
  } else if (ime.length > 20) {
    greska_ime.textContent = "Ime je predugačko, maksimum 20 karaktera!";
  }

  if (prezime === "") {
    greska_prezime.textContent = "Prezime je obavezno!";
  } else if (prezime.length > 30) {
    greska_prezime.textContent = "Prezime je predugačko, maksimum 30 karaktera!";
  }

  //proverava da li unos nije broj ili je prazno
  if (tel === "") {
    greska_tel.textContent = "Telefon je obavezan!";
  } else if (isNaN(tel)) {
    greska_tel.textContent = "Pogrešan format za broj telefona, koristite samo cifre!";
  }

  //provera za adresu
  if (adresa === "") {
    greska_adresa.textContent = "Adresa je obavezna!";
  } else if (adresa.length > 50) {
    greska_adresa.textContent = "Adresa je predugačka, maksimum 50 karaktera!";
  }

  if (email === "") {
    greska_email.textContent = "Email je obavezan!";
  }

  //jednostavna provera za email
  let at = -1, tacka = -1;
  for (let i = 0; i < email.length; i++) {
    let karakter = email.charAt(i);
    if (karakter === '@') {
      at = i;
    }
    else if (karakter === '.') {
      tacka = i;
    }
  }
  if (at == -1 || tacka == -1 || at > tacka) {
    greska_email.textContent = "Neispravna email adresa";

  }
  //proverava da li se unete sifre podudaraju
  if (sifra === "" || sifra_provera === "") {
    greska_sifra.textContent = "Šifra je obavezna!";

  } else if (sifra !== sifra_provera) {
    greska_sifra.textContent = "Unete šifre se ne slažu";
  }

  if (!uslovi.checked || !godine.checked) {
    greska_uslovi.textContent = "Morate da označite oba uslova!"
  }
  //proverava da li je upisana neka greska
  sveGreske.forEach(element => {
    if (element.textContent !== "") {
      greska = true;
    }
  });

  //podaci o bazi i kreiranju korisnika
  const url = "api/korisnici/create.php";
  const data = {
    ime: ime,
    prezime: prezime,
    email: email,
    sifra: sifra,
    tel: tel,
    adresa: adresa,
    mode: ""
  };

  //parametri za slanje serveru
  const param = {
    headers: {
      "content-type": "application/json; charset=UTF-8"
    },
    body: JSON.stringify(data),
    method: "POST"
  };

  //ako postoji greska, sprečava slanje formulara, inače pokreće se fetch funkcija i pokušava da registruje korisnik
  if (greska) {
    return false;
  }
  registerUser();
  
  json_odgovor.className = "loader";

  async function registerUser() {
    //sacekaj odgovor od fetcha i sacuvaj u response
    const response = await fetch(url, param);
    //ako je status 400 i veci znaci da je doslo do greske kod konekcije sa serverom i ispisuje gresku
    if (response.status >= 400) {
      json_odgovor.className = "alert alert-danger";
      json_odgovor.textContent = "Greška sa serverom. Molimo Vas da pokušate kasnije";
    }
    //dobijamo odgovor u obliku JSON
    const odgovor = await response.json();
    //u json odgovoru postoji error koji oznacava koji je tip poruke i od toga zavisi sta ce da se ispise
    if (odgovor.error) {
      json_odgovor.className = "alert alert-danger";
    } else {
      json_odgovor.className = "alert alert-success";
    }
    json_odgovor.textContent = odgovor.message;

  }


  //ovo je prvi nacin na koji sam radio bez async/await
  //ostavio sam kao primer za kasnije

  // fetch(url, param)
  //   .then(response => {
  //     //Dobijamo odgovor od servera
  //     //ako je status 400 i veci znaci da je doslo do greske kod konekcije sa serverom i ispisuje gresku
  //     // console.log(response);
  //     if (response.status >= 400) {
  //       json_odgovor.className = "alert alert-danger";
  //       json_odgovor.textContent = "Greška sa serverom. Molimo Vas da pokušate kasnije";
  //     }
  //     return response.json();
  //   })
  //   .then(json => {
  //     //koristimo json odgovor koji smo dobili od servera
  //     if (json.error) {
  //       json_odgovor.className = "alert alert-danger";
  //     } else {
  //       json_odgovor.className = "alert alert-success";
  //     }
  //     json_odgovor.textContent = json.message;
  //   })
  //   .catch(error => console.log(error))

});


