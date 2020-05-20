<?php
/*
* Gör ett webbapp som i en textruta frågar efter ett filnamn på servern. Kontrollera sedan filnamnet så att det endast innehåller bokstäver, siffror och punkt. Om kontrollen ger OK, så öppna filen och skriv ut filinnehållet på skärmen.
*
* PHP version 7
* @category   Kontrollera inmatning
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 7.2</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Läsa textfil</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label>Filnamn</label>
            <input type="text" name="filnamn" required>
            <button class="primary">Skicka</button>
        </form>
        <?php

        /* Ta emot data som skickas */
        $filnamn = filter_input(INPUT_POST, 'filnamn', FILTER_SANITIZE_STRING);
        if ($filnamn) {

            /* Kontrollera filnamnet så att det endast innehåller bokstäver, siffror och punkt. */
            if (preg_match("/[^a-zåäö0-9.]+/", $filnamn)) {
                echo "<p>Filnamnet <strong>$filnamn</strong> är INTE korrekt!</p>";
            } else {
                echo "<p>Filnamnet <strong>$filnamn</strong> är korrekt!</p>";

                /* Läs filen */
                $texten = file_get_contents($filnamn);
    
                /* Skriv ut innehållet */
                echo "<p class=\"blå\">$texten</p>";
            }
        }
        ?>
    </div>
</body>
</html>