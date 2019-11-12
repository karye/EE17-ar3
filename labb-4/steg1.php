<?php
/*
* Data från https://pcpartpicker.com/products/cpu/
* 
* PHP version 7
* @category   Webbshop
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/

include_once "./funktioner.inc.php";
?>
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
        <h1>Bygg din PC - steg 1</h1>
        <h2>Välj CPU</h2>
        <form action="./steg2.php" method="post">
        <?php
        /* Lista alla produkter i katalogen */
        $katalog = "./shop-bilder/cpu";

        /* Hämta katalogens innehåll */
        $filer = scandir($katalog);
        foreach ($filer as $fil) {
            $info = pathinfo("./$fil");
            if ($info['extension'] == 'jpg' || $info['extension'] == 'png' || $info['extension'] == 'webp') {
                echo "<label>";
                echo "<input type=\"radio\" name=\"vara\" value=\"$fil\">";
                echo "<img src=\"$katalog/$fil\">";
                $vara = vara($fil);
                $pris = pris($fil);
                echo "$vara $pris:-";
                echo "</label>";
            }
        }
        ?>
        <button>Nästa</button>
        </form>
    </div>
</body>
</html>