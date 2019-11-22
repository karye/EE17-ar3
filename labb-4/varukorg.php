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
        <h1>Bygg din PC</h1>
        <h2>Varukorg</h2>
        <?php
        /* Visa innehållet på varukorgen = varukorg.txt */
        $varukorg = "./varukorg.txt";

        /* Ta emot data som skickas */
        $vara = filter_input(INPUT_POST, 'vara', FILTER_SANITIZE_STRING);
        if ($vara) {
            $varukorgText = file_get_contents("$varukorg");

            /* Kolla om varan inte redan finns redan  */
            $pos = strpos($varukorgText, $vara);
            if ($pos === false) {
                /* Spara ned i varukorg.txt */
                $handtag = fopen($varukorg, 'a');
                fwrite($handtag, "$vara\n");
                fclose($handtag);
            }
        }

        if (is_readable($varukorg)) {
            /* Läs in textfilen varukorg.txt i en array */
            $rader = file($varukorg);
            $total = 0;

            /* Skriv ut som tabell */
            echo "<table>";
            echo "<thead>";
            echo "<tr>
                <th>Vara</th>
                <th>Antal</th>
                <th>Pris</th>
                <th>Summa</th>
                </tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($rader as $rad) {
                $vara = vara($rad);
                $pris = pris($rad);
                $total = $total + $pris;
                echo "<tr>
                    <td>$vara</td>
                    <td><button id=\"minus\">-</button> <span id=\"antal\">1</span> <button id=\"plus\">+</button></td>
                    <td id=\"pris\">$pris:-</td>
                    <td id=\"summa\">$pris:-</td>
                    </tr>";
            }
            echo "</tbody>";
            echo "<tfoot>";
            echo "<tr>
                <td>Total</td>
                <td></td>
                <td></td>
                <td id=\"total\">$total:-</td>
                </tr>";
            echo "</tfoot>";
            echo "</table>";  
        } else {
            echo "<p>Varukorgen saknas!</p>";
        }
        ?>
        <a class="knapp" href="./steg1.php">Börja om!</a>
    </div>
    <script src="./shop.js"></script>
</body>
</html>