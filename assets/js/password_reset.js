document.getElementById("reset_pass").addEventListener("click", function (e) {

    //čuva unose u promenljivim i briše prazna polja (whitespace)  
    let email = document.getElementById("forgot_email").value.trim();
    const forgot_message = document.getElementById("forgot_message");
    
    if(!email){
        forgot_message.textContent = "Unesite email adresu";
        return;
    }
    //resetuje se polje za poruku
    forgot_message.textContent = "";
    const url = "recover_pass.php";
    //uzima email iz input polja
    var formData = new FormData();
    formData.append('forgot_email', email);

    //parametri za slanje serveru
    const param = {
        body: formData,
        method: "POST"
    };

    resetPassword();

    forgot_message.className = "loader";

    async function resetPassword() {
        //sacekaj odgovor od fetcha i sacuvaj u response
        const response = await fetch(url, param);
        //ako je status 400 i veci znaci da je doslo do greske kod konekcije sa serverom i ispisuje gresku
        if (response.status >= 400) {
            forgot_message.className = "text-danger";
            forgot_message.textContent = "Greška sa serverom";
        }
        //dobijamo odgovor u obliku teksta
        const odgovor = await response.text();
        //Posto kod uspesne funkcije send(), ispisuju se podaci o slanju, nama treba samo poruka na kraju
        //sa indexOf se odredi gde poruka pocinje i dodaje se jos 8 da bi se doslo do stvarnog pocetka poruke
        //substr ispisuje samo deo od stvarnog pocetka poruke
        const poruka = odgovor.substr(odgovor.indexOf("Poruka")+8);
        // //za bolje razumevanje
        // console.log(odgovor);
        // console.log(poruka);
        forgot_message.className = "text-danger";
        forgot_message.textContent = poruka;
    }
});


