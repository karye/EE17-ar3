<?php
/*
* Hämta temperaturprognos från SMHI:s öppna api i JSON-format,
* och visualisera i en graf.
* 
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
    <title>Temperaturprognos från SMHI</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Temperaturprognos - Stockholm</h1>
        <?php
        /* Url till api:et */
        $url = "https://opendata-download-metfcst.smhi.se/api/category/pmp3g/version/2/geotype/point/lon/18/lat/59/data.json";

        /* Hämta JSON-data */
        $json = file_get_contents($url);

        /* Avkoda JSON-datat */
        $jsonData = json_decode($json);

        /* Publiceringsdatum */
        $approvedTime = $jsonData->approvedTime;
        echo "<p>Prognos publicerad den $approvedTime</p>";

        /* Plocka tidserien */
        $timeSeries = $jsonData->timeSeries;

        /* Loopar igenom arrayen för att plocka temperaturvärdena */
        foreach ($timeSeries as $timeData) {
            $validTime = $timeData->validTime;

            /* Plocka ut parametrarna */
            $parameters = $timeData->parameters;

            /* Plocka ut temperaturen = objekt nr 12 */
            $parameter = $parameters[11];
            $temperatur = $parameter->values[0];
            echo "<p>$validTime $temperatur</p>";
        }
        ?>
    </div>
</body>
</html>