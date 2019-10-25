<?php
/*
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
    <title>Dagens väder</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Väderprognos</h1>
        <?php

    $url = "https://www.klart.se/se/stockholms-l%C3%A4n/v%C3%A4der-stockholm/";

    /* Ladda ned webbsiddan med file_get_contents */
    $sidan = file_get_contents($url);

    /* Leta rätt på början av horoskopet med strpos*/
    $start = strpos($sidan, "<article class=\"place-day \">");
    if ($start !== false) {

        /* Leta rätt på slutet av horoskopet med strpos */
        $slut = strpos($sidan, "</article>", $start);
        if ($slut !== false) {

            /* Plocka ut horoskop-koden med substr */
            $längd = $slut - $start - 7;
            $väder = substr($sidan, $start + 7, $längd);

            /* Skriv ut vädret */
            echo $väder;
        } else {
            echo "<p>Hittade INTE slut</p>";
        }

    } else {
        echo "<p>Hittade INTE start</p>";
    }
?>
    </div>
</body>
</html>