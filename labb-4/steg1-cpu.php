<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webbshop - steg 1 - cpu</title>
    <link rel="stylesheet" href="./shop.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bygg din egen PC - steg 1</h1>
        <h2>Varukorg</h2>
        <?php
        /* Visa innehållet på varukorgen = varukorg.txt */
        $varukorg = "./varukorg.txt";

        if (is_readable($varukorg)) {
            /* Läs in textfilen varukorg.txt i en array */
            $rader = file($varukorg);

            /* Skriv ut rad-för-rad */
            foreach ($rader as $rad) {
                echo "<p>$rad</p>";
            }     
        } else {
            echo "<p>Varukorgen saknas!</p>";
        }
        ?>
        <h2>Välj CPU</h2>
        <form action="" method="post">
        <?php
        /* Lista alla produkter i katalogen */
        $katalog = "./shop-bilder/cpu";

        /* Hämta katalogens innehåll */
        $filer = scandir($katalog);
        foreach ($filer as $fil) {
            $info = pathinfo("./$fil");
            if ($info['extension'] == 'jpg') {
                echo "<label>";
                echo "<input type=\"radio\" name=\"vara\" value=\"$fil\">";
                echo "<img src=\"$katalog/$fil\">";
                echo "$fil";
                echo "</label>";
            }
        }

        ?>
        <button>Nästa</button>
        </form>
    </div>
</body>
</html>