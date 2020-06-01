<?php
/*
* Hämta väder från SMHI
* 
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <link rel="stylesheet" href="./prognos.css">
</head>
<body>
    <div class="kontainer">
        <h1>Temperaturprognos - Stockholm</h1>
        <canvas id="myChart" width="400" height="100"></canvas>
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

        /* Samla in datat: tider och temperaturer */
        $tiderData = "";
        $tempData = "";

        /* Bara ta med 55 första värdena  */
        $timeSeries = array_slice($timeSeries, 0, 55);

        /* Loopa arrayen för att plocka ut temperaturvärdena */
        foreach ($timeSeries as $timeData) {
            /* Plocka tidpunkt */
            $validTime = $timeData->validTime;

            /* Plocka ut alla parametrar */
            $parameters = $timeData->parameters;

            /* Plocka ut temperaturen = objekt nr 12 */
            $parameter = $parameters[11];
            $temperaturen = $parameter->values[0];

            /* Plocka bara datum-delen: substr() */
            $datumDelen = substr($validTime, 0, 10);

            /* För att bara skriva datumet en första gång */
            $pos = strpos($tiderData, $datumDelen);

            if ($pos === false) {
                $tiderData .= "'$datumDelen', ";
            } else {
                $tiderData .= "'', ";
            }

            $tempData .= "'$temperaturen', ";

            //echo "<p>$tiderData</p>";
            //echo "<p>$tempData</p>";
        }

        /* Chart.js koden */
        echo "<script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [$tiderData],
                datasets: [{
                    label: 'SMHI prognos',
                    data: [$tempData],
                    backgroundColor: [
                        'rgb(173, 216, 230, 0.3)'
                    ],
                    borderColor: [
                        'blue'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>";
        ?>
    </div>
</body>
</html>