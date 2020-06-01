window.onload = start;

function start() {
    /* Element som vi jobbar med */
    const eleTabell = document.querySelector("table");

    /* När man klickar i tabellen */
    eleTabell.addEventListener("click", klick);
    function klick(e) {
        console.log(e.target.nodeName);
        
        if (e.target.nodeName === "BUTTON") {
            summera(e.target);
        }
    }
    function summera(knapp) {
        const eleRad = knapp.parentNode.parentNode;
        const eleAntal = eleRad.querySelector("#antal");
        const elePris = eleRad.querySelector("#pris");
        const eleSumma = eleRad.querySelector("#summa");

        /* Hämta värdena */
        var antal = parseInt(eleAntal.textContent);
        var pris = parseInt(elePris.textContent);
        var summa = parseInt(eleSumma.textContent);

        /* Vilken knapp klickade vi på? */
        if (knapp.id === "plus") {
            antal++;
        } else {
            if (antal > 0) {
                antal--;
            }
        }

        /* Skriv tillbara resultater */
        eleAntal.textContent = antal;
        eleSumma.textContent = (antal * pris) + ":-";

        /* Summera hela varukorgen */
        totalVaror();
    }

    function totalVaror() {
        const eleTotal = document.querySelector("#total");
        const eleSummor = document.querySelectorAll("#summa");
        var total = 0;

        /* Addera rad-för-rad */
        for (const eleSumma of eleSummor) {
            total = total + parseInt(eleSumma.textContent);
        }

        /* Skriv tillbaka totalen */
        eleTotal.textContent = total + ":-";
    }
}