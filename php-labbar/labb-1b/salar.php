<?php
/*
* PHP version 7
* @category   Läsa textfil
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skolans salar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Skolans salar</h1>
        <?php
        /* 1. Läs in textfilen */
        $textfil = "salar.tsv";
        if (is_readable($textfil)) {
            
            $rader = file($textfil);
            /* 2. Visa salar i en tabell: nr, namn, bokbar */
            echo "<table>";
            echo "<tr><th>Nr</th><th>Namn</th><th>Typ</th><th>Bokbar</th></tr>";
            foreach ($rader as $rad) {
                //echo "<p>$rad</p>";

                /* Dela upp raden i dess delar */
                $delar = explode("\t", $rad);
                //var_dump($delar);

                /* Plocka ut det som vi behöver */
                $salNrNamn = $delar[1]; // Dvs "410/Dali"
                $bokbar = $delar[3]; // Dvs 1

                /* Plocka ut salsnr och salsnamn */
                if ((strstr($salNrNamn, "/") || $salNrNamn == "430" || $salNrNamn == "522" || substr($salNrNamn, 0, 1) == "A" || $salNrNamn == "Biblioteket" || $salNrNamn == "Dr Kristinas sal") && $salNrNamn != "APL" && $salNrNamn != "Annan plats") {

                    /* Om Salsnr innehåller "/" */
                    if (strstr($salNrNamn, "/")) {
                        $delar = explode("/", $salNrNamn);
                        $salNr = $delar[0]; // Dvs "410"
                        $salNamn = $delar[1]; // Dvs "Dali"
                    } else {
                        $salNr = $delar[1]; // Dvs "A1"
                        $salNamn = ""; 
                    }

                    /* Plocka ut salsnr och salsnamn för Annexet */
                    if (strstr($salNrNamn, "(")) { // Dvs "A1 (Mattesal)"
                        $delar = explode(" (", $salNrNamn);
                        $salNr = $delar[0];
                        $salNamn = substr($delar[1], 0, -1); // Ta bort sista parantesen
                    }

                    /* Om salNr har ett bindestreck, dela upp igen */
                    if (strstr($salNr, "-")) { // Dvs 506-grupprum
                        $delar = explode("-", $salNr);
                        $salNr = $delar[0];
                        $salTyp = $delar[1];
                    } else {
                        $salTyp = "sal";
                    }
                    
                    if ($bokbar == "1") {
                        echo "<tr><td>$salNr</td><td>$salNamn</td><td>$salTyp</td><td class=\"grön\"></td></tr>";
                    } else {
                        echo "<tr><td>$salNr</td><td>$salNamn</td><td>$salTyp</td><td class=\"röd\"></td></tr>";
                    }
                }
            }
            echo "</table>";
        } else {
            echo "<p>$textfil går inte att läsa!</p>";
        }
        
        /* 3. Visa om salen är bokad med röd färg, om ledig med grön färg */

        ?>
    </div>
</body>
</html>