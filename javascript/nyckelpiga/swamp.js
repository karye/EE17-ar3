/* Element vi arbetar med */
const eCanvas = document.querySelector("canvas");

/* Ställ in bredd och storlek */
eCanvas.width = 800;
eCanvas.height = 600;

/* Starta canvas rityta */
var ctx = eCanvas.getContext("2d");

/* Globala variabler */
var gameOver = false;
var piga = {
    rad: 0,
    kol: 0,
    rot: 0,
    bild: new Image()
}
var monster = {
    x: 0,
    y: 0,
    bild: new Image()
}
var monster2 = {
    x: 0,
    y: 0,
    bild: new Image()
}
/* 16 kolumner x 12 rader (varje ruta är 50*50px) */
var karta = [
    [0,  1,  2, 33,  33, 33,  3,  0,  0, 0, 54, 0, 0, 0, 54, 0],
    [0, 21, 13,  0, 54,  0, 56,  0, 54, 0, 55, 0, 54, 0, 55, 0],
    [0,  0, 55,  0, 55,  0,  0,  0, 55, 0, 55, 0, 55, 0, 55, 0],
    [31, 0, 55,  0, 21, 33, 33, 33, 35, 0, 56, 0, 55, 0, 55, 0],
    [0,  0, 56,  0,  0,  0,  0,  0, 56, 0, 0, 0, 55, 0, 55, 0],
    [0, 54, 32, 33, 34,  0,  1, 33, 33, 33, 34, 0, 55, 0, 55, 0],
    [0, 55,  0,  0,  0,  0, 55,  0,  0, 0, 0, 0, 55, 0, 55, 0],
    [0, 55,  0, 32,  3,  0, 55,  0,  32, 33, 3, 0, 55, 0, 55, 0],
    [0, 55,  0,  0, 55,  0, 55,  0,  0, 0, 55, 0, 55, 0, 55, 0],
    [0, 55,  31, 0, 55,  0,  21,  33,  34, 0, 55, 0, 55, 0, 56, 0],
    [0, 56,  0,  0, 56,  0,  0,  0,  0, 0, 56, 0, 56, 0, 0, 0],
    [0,  0,  0,  1,  2,  2,  2,  2,  2, 2, 2, 2, 2, 2, 2, 2]
];

/* Nyckelpigans startvärden */
piga.rad = 0;
piga.kol = 0;
piga.bild.src = "./nyckelpiga.png";

/* Monstrets startvärden */
monster.x = Math.ceil(Math.random() * 750);
monster.y = 0;
monster.bild.src = "./monster.png";
monster2.x = Math.ceil(Math.random() * 750);
monster2.y = 0;
monster2.bild.src = "./monster.png";

/* Ladda in tilesheet */
var tileSheet = new Image();
tileSheet.src = "./tilesheet-swamp.png";

/* Välj textinställningar */
ctx.font = "bold 96px sans-serif";
ctx.textAlign = "center";

/* Rita ut nyckelpigan */
function ritaPiga() {
    ctx.save();
    ctx.translate(piga.kol * 50 + 25, piga.rad * 50 + 25);
    ctx.rotate(piga.rot);
    ctx.drawImage(piga.bild, -25, -25, 50, 50);
    ctx.restore();
}

/* Rita ut monstret */
function ritaMonster() {
    ctx.drawImage(monster.bild, monster.x, monster.y);
    monster.y++;
    if (monster.y > 600) {
        monster.y = 0;
        monster.x = Math.ceil(Math.random() * 750);
    }
}
function ritaMonster2() {
    ctx.drawImage(monster2.bild, monster2.x, monster2.y);
    monster2.y++;
    if (monster2.y > 600) {
        monster2.y = 0;
        monster2.x = Math.ceil(Math.random() * 750);
    }
}

/* Kolla om pigan träffas av monstret */
function krock() {
    /* Om monster är i höjd med pigan */
    if ((piga.rad * 50) < monster.y && monster.y < (piga.rad * 50 + 50)) {
        if ((piga.kol * 50) < monster.x && monster.x < (piga.kol * 50 + 50)) {
            ctx.fillStyle = "#888";
            ctx.fillRect(0, 0, 800, 600);
            ctx.fillStyle = "red";
            ctx.fillText("Game Over!", 400, 300);
            gameOver = true;
        }
    }
    if ((piga.rad * 50) < monster2.y && monster2.y < (piga.rad * 50 + 50)) {
        if ((piga.kol * 50) < monster2.x && monster2.x < (piga.kol * 50 + 50)) {
            ctx.fillStyle = "#888";
            ctx.fillRect(0, 0, 800, 600);
            ctx.fillStyle = "red";
            ctx.fillText("Game Over!", 400, 300);
            gameOver = true;
        }
    }
}

/* Rita ut kartan */
function ritaKarta() {
    /* Gå igenom varje rad */
    for (let rad = 0; rad < karta.length; rad++) {
        /* Gå igenom varje kolumn */
        for (let kol = 0; kol < karta[rad].length; kol++) {
            if (karta[rad][kol] != 0) {
                var rutaId = karta[rad][kol] - 1;
                var rutaX = Math.floor(rutaId % 10) * 32;
                var rutaY = Math.floor(rutaId / 10) * 32;
                ctx.drawImage(tileSheet, rutaX, rutaY, 32, 32, kol * 50, rad * 50, 50, 50);
            }
        }
    }
}

/* Lyssna på pil-tangenter */
window.addEventListener("keydown", function(e) {
    switch (e.key) {
        case "ArrowRight":
            if (karta[piga.rad][piga.kol + 1] == 0) {
                piga.kol++;
            }
            piga.rot = 90 * (Math.PI / 180);
            break;
        case "ArrowLeft":
            if (karta[piga.rad][piga.kol - 1] == 0) {
                piga.kol--;
            }
            piga.rot = -90 * (Math.PI / 180);
            break;
        case "ArrowDown":
            if (karta[piga.rad + 1][piga.kol] == 0) {
                piga.rad++;
            }
            piga.rot = Math.PI;
            break;
        case "ArrowUp":
            if (karta[piga.rad - 1][piga.kol] == 0) {
                piga.rad--;
            }
            piga.rot = 0;
            break;
    }
});

/* Animationsloopen */
ctx.fillStyle = "#000";
function gameLoop() {
    /* Rensa canvas */
    ctx.clearRect(0, 0, eCanvas.width, eCanvas.height);

    ritaKarta();
    ritaPiga();

    ritaMonster();
    ritaMonster2();

    krock();

    if (!gameOver) {
        requestAnimationFrame(gameLoop);
    }
}

/* Starta spelet */
gameLoop();