<?php
/*
* Data från https://pcpartpicker.com/products/cpu/
*
* PHP version 7
* @category   Lånekalkylator
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bygg din PC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">
    <link rel="stylesheet" href="./style/shop.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bygg din PC</h1>
        <?php
        $katalog = './shop-bilder/cpu';

        echo "<form action=\"#\">";
        $filer = scandir($katalog);
        foreach ($filer as $fil) {
            if (is_dir($fil)) {
            } else {
                echo "
                <label>
                    <input class=\"with-gap\" name=\"cpu\" type=\"radio\">
                    <img src=\"$katalog/$fil\" alt=\"$fil\">
                    <span>$fil</span>
                </label>";
            }
        }
        echo "<button class=\"primary\">Nästa</button>";
        echo "</form>";
        ?>
    </div>
</body>
</html>