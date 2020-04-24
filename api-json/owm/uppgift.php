<?php
/*
* PHP version 7
* @category   Hämta JSON-data från api
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weather from OWM</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="kontainer">
        <?php
        /* Api-nyckel */
        $api = "22ee1d58f7adae08ee71fa7c0bd24481";

        /* Stad */
        $stad = "Stockholm";

        echo "<h1>Vädret idag i $stad</h1>";

        /* Url till api-tjänsten */
        $url = "https://api.openweathermap.org/data/2.5/weather?q=$stad&appid=$api&units=metric";

        /* Plocka ut koordinaterna */

        /* Plocka vädret och ikon just nu */
        /* http://openweathermap.org/img/wn/$ikon@2x.png */

        /* Plocka ut temperaturen just nu */

        /* Plocka ut vindhastigheten */

        ?>
    </div>
</body>
</html>