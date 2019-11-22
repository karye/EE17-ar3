const svgE = document.querySelector('svg');

svgE.addEventListener("click", boka);

function boka(e) {

    if (e.target.nodeName = 'RECT') {
        e.target.classList.toggle("on");
        console.log("sal click");
    }
}