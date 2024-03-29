    //Dugme za submit oglasa
    let unos_oglasa = document.getElementById('unos_oglasa');
    //Definišu se obavezni elementi unosa
    let naziv = document.getElementById('naziv');
    let cena = document.getElementById('cena');
    let cpu = document.getElementById('cpu');
    let ram = document.getElementById('ram');
    let ekran = document.getElementById('ekran');
    let gpu = document.getElementById('gpu');
    let hdd = document.getElementById('hdd1');
    let ssd = document.getElementById('hdd2');
    let os = document.getElementById('os');
    let lokacija = document.getElementById('lokacija');
    //Polje za ispis eventualnih grešaka u predaji oglasa
    let greska_ispis = document.getElementById('greska_ispis');
    //Kada se klikne na 'Predaj oglas' pre slanja podataka u bazu vrši se validacija
    unos_oglasa.addEventListener('submit', (e) => {
        //U niz 'poruke' ce se dodavati sledeće niske ako su ispunjeni uslovi za grešku
        let poruke = [];

        if (naziv.value == "") {
            poruke.push("Naziv laptopa je obavezan");
        }
        if (naziv.value.length > 20) {
            poruke.push("Naziv laptopa je predugačak");
        }
        if (cena.value == "") {
            poruke.push("Cena je obavezna");
        }
        if (cena.value < 100 || cena.value > 1000000) {
            poruke.push("Raspon cene mora biti između 100 i 1000000");
        }
        if (cpu.selectedIndex == 0) {
            poruke.push("Odaberite vrstu procesora vašeg laptopa");
        }
        if (ram.selectedIndex == 0) {
            poruke.push("Odaberite količinu RAM memorija vašeg laptopa");
        }
        if (ekran.selectedIndex == 0) {
            poruke.push("Odaberite dimenziju ekrana vašeg laptopa");
        }
        if (gpu.selectedIndex == 0) {
            poruke.push("Odaberite vrstu grafičke kartice vašeg laptopa");
        }
        if (hdd.selectedIndex == 0) {
            poruke.push("Odaberite HDD vašeg laptopa. Ukoliko vaš laptop nema HDD odaberite opciju \"nema\"");
        }
        if (ssd.selectedIndex == 0) {
            poruke.push("Odaberite SSD vašeg laptopa. Ukoliko vaš laptop nema SSD odaberite opciju \"nema\"");
        }
        if (os.selectedIndex < 0) {
            poruke.push("Odaberite operativni sistem vašeg laptopa");
        }
        if (lokacija.value == "") {
            poruke.push("Polje lokacija je obavezno");
        }
        //Ukoliko postoji neka greška, niz 'poruke' je formiran i ispisuju se sve niske iz njega  
        if (poruke.length > 0) {
            e.preventDefault();
            greska_ispis.innerText = "OGLAS NIJE POSLAT!!! \n" + poruke.join(',\n ');
        }

    });
    //Ukoliko se formular za unos oglasa resetuje, korisnik se pita za potvrdu. U slučaju potvrde uneti podaci se brišu
    unos_oglasa.onreset = function() {
        var prozor = window.confirm("Podaci će biti obrisani. Da li ste sigurni?");
        return prozor;
    };