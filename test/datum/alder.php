<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ålder från personnummer</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="kontainer">
        <h2>Ålder från personnummer</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
            <label>Personnummer</label>
            <input type="text" name="personnr" placeholder="Tex 19641212" required>
            <button class="primary">Skicka</button>
        </form>
        <?php
/* Läs in data */
$personnr = filter_input(INPUT_POST, 'personnr', FILTER_SANITIZE_STRING);
if ($personnr) {

    /* Plocka ut år, månad, dag */
    $personnr = "$personnr";
    $då = new DateTime($personnr);

    /* Idag */
    $nu = new DateTime();

    /* Skillnaden */
    $skillnad = $nu->diff($då);

    /* Plocka ut ålder */
    $ålder = $skillnad->y;
    $månader = $skillnad->m;

    echo "<p>Ditt personnummer är $personnr.</p>";
    echo "<p>Du är $ålder år och $månader månader.</p>";
} else {
    echo "<p>Data saknas!</p>";
}
?>
    </div>
</body>
</html>