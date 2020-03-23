/* Element vi arbetar med */
const eCanvas = document.querySelector("canvas");

/* Ställ in bredd och storlek */
eCanvas.width = 800;
eCanvas.height = 600;

/* Starta canvas rityta */
var ctx = eCanvas.getContext("2d");

/* Globala variabler */
var piga = {
    x: 0,
    y: 0,
    rot: 0,
    bild: new Image()
}

/* Nyckelpigans startläge */
piga.x = eCanvas.width / 2;
piga.y = eCanvas.height / 2;
piga.bild.src = "./nyckelpiga.png";

/* Rita ut nyckelpigan */
function ritaPiga() {
    ctx.save();
    ctx.translate(piga.x, piga.y);
    ctx.drawImage(piga.bild, -25, -25, 50, 50);
    ctx.restore();
}

/* Lyssna på pil-tangenter */
window.addEventListener("keydown", function(e) {
    switch (e.key) {
        case "ArrowRight":
            piga.x += 5;
            piga.rot = 90 * (Math.PI / 180);
            break;
        case "ArrowLeft":
            piga.x -= 5;
            break;
        case "ArrowDown":
            piga.y += 5;
            break;
        case "ArrowUp":
            piga.y -= 5;
            break;
    }
});

/* Animationsloopen */
function gameLoop() {
    /* Rensa canvas */
    ctx.clearRect(0, 0, eCanvas.width, eCanvas.height);

    ritaPiga();

    requestAnimationFrame(gameLoop);
}

/* Starta spelet */
gameLoop();