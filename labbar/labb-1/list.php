<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Läsa in csv-fil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Alla restauranger</h1>
        <?php
        $filename = './restauranger.csv';

        /* Är filen läsbar? */
        if (is_readable($filename)) {
            //echo "<p>Kan läsa filen.</p>";

            /* Läs in filen */
            $rader = file($filename);

            echo "<table>";
            echo "<tr><th>Namn</th><th>Gata</th><th>Postnr</th><th>Postort</th></tr>";
            foreach ($rader as $rad) {

                /* Dela upp raden */
                $delar = explode(', ', $rad);

                /* Skriv ut tabellrad */
                echo "<tr><td>$delar[0]</td><td>$delar[1]</td><td>$delar[2]</td><td>$delar[3]</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Kan ej läsa filen.</p>";
        }
        ?>
    </div>
</body>
</html>