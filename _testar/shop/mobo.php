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
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/shop.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bygg din PC - steg 1</h1>
        <?php
        $cpu = filter_input(INPUT_POST, 'cpu', FILTER_SANITIZE_STRING);
        if ($cpu) {
            echo "<h2>Du har valt</h2>";
            echo "<p>Cpu: $cpu</p>";
            echo "<h2>Välj moderkort</h2>";
        }
        echo "<form action=\"./mobo.php\" method=\"post\">";
        $katalog = './shop-bilder/mobo';
        $filer = scandir($katalog);
        foreach ($filer as $fil) {
            if (is_dir("$katalog/$fil")) {
            } else {
                $delar = pathinfo("$katalog/$fil");
                $filtyp = $delar['extension'];
                $filnamn = $delar['filename'];

                if ($filtyp == 'jpg') {
                    echo "
                <label>
                    <input class=\"with-gap\" name=\"cpu\" type=\"radio\" value=\"$filnamn\" required>
                    <img src=\"$katalog/$fil\" alt=\"$filnamn\">
                    <span>$filnamn</span>
                </label>";
                }
            }
        }
        echo "<button class=\"primary\">Nästa</button>";
        echo "</form>";
        ?>
    </div>
</body>
</html>