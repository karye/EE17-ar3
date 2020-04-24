<?php
/*
* PHP version 7
* @category   Hämta JSON-data från SMHI-api
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Temperaturprognos från SMHI api</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Temperaturprognos - Stockholm</h1>
        <?php
        /* Url till api:et */
        $url = "https://opendata-download-metfcst.smhi.se/api/category/pmp3g/version/2/geotype/point/lon/18/lat/59/data.json";

        /* Hämta JSON */
        $json = file_get_contents($url);

        /* Avkoda JSON */
        $jsonData = json_decode($json);

        /* Plocka ut publiceringsdatum */
        $approvedTime = $jsonData->approvedTime;
        echo "<p>Prognos publicerad den $approvedTime</p>";

        /* Plocka ut tidserien */
        $timeSeries = $jsonData->timeSeries;

        /* Loopa arrayen för att plocka ut temperaturvärdena */
        foreach ($timeSeries as $timeData) {
            /* Plocka tidpunkt */
            $validTime = $timeData->validTime;

            /* Plocka ut alla parametrar */
            $parameters = $timeData->parameters;

            /* Plocka ut temperaturen = objekt nr 12 */
            $parameter = $parameters[11];
            $temperaturen = $parameter->values[0];

            echo "<p>$validTime $temperaturen</p>";
        }
        ?>
    </div>
</body>
</html>