<?php
/*
* Hämta närmsta hållplatser från trafiklabs api
*
* PHP version 7
* @category   Hämta JSON-data från api
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/

/* Ta emot POST-data från klienten */
$lat = filter_input(INPUT_POST, "lat", FILTER_SANITIZE_STRING);
$lon = filter_input(INPUT_POST, "lon", FILTER_SANITIZE_STRING);

if ($lat && $lon) {
    /* api-nyckel */
    $api = "5a04359da47042b7837f88a5c61908c9";

    /* Sökradien i meter */
    $radius = 1000;

    /* Max antal svar, dvs antal hållplatser*/
    $max = 25;

    /* Url till api:et */
    $url = "http://api.sl.se/api2/nearbystops.json?key=$api&originCoordLat=$lat&originCoordLong=$lon&maxresults=$max&radius=$radius";

    /* Hämta JSON */
    $json = file_get_contents($url);

    /* Avkoda JSON */
    $jsonData = json_decode($json);

    /* Plocka ut hållplatserna (arrayen) */
    $stopLocation = $jsonData->LocationList->StopLocation;

    /* Skicka vidare arrayen */
    echo json_encode($stopLocation);
} else {
    echo "Något blev fel med indata.";
}
