/* 
1. Öva först på att läsa av element
2. Öva på att räkna ned och räkna upp
3. Öva på att ändra på summa = antal * pris
4. Öva på knappar i en tabell
5. Öva på bubble events
*/

window.onload = start;

function start() {
    const tabellEl = document.querySelector("table");
    const totallEl = document.querySelector("#total");

    tabellEl.addEventListener("click", klick);

    function klick(e) {
        console.log(e.target.nodeName);

        /* Har man klickat på en knapp */
        if (e.target.nodeName === 'BUTTON') {
            summaVara(e.target);
        }
    }

    function summaVara(knapp) {
        const rad = knapp.parentNode.parentNode;
        const antalEl = rad.querySelector("#antal");
        const prisEl = rad.querySelector("#pris");
        const summaEl = rad.querySelector("#summa");
        console.log(antalEl.textContent);
        
        var antal = antalEl.textContent;
        var pris = prisEl.textContent;
        var summa = summaEl.textContent;

        if (knapp.id === "plus") {
            antal++;
        } else {
            if (antal > 1) {
                antal--;
            }
        }
        antalEl.textContent = antal;
        summaEl.textContent = (antal * parseInt(pris)) + ":-";

        summaVaror();
    }

    function summaVaror() {
        const summor = document.querySelectorAll("#summa");
        var total = 0;
        for (const summa of summor) {
            total += parseInt(summa.textContent);
        }
        totallEl.textContent = total + ":-";
    }
}