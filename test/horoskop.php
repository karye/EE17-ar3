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
    <title>Dagens horoskop</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body class="horoskop">
    <div class="kontainer">
        <h1>Horoskop</h1>
        <?php
$tecknen = ["Väduren", "Oxen", "Tvillingarna", "Kräftan", "Lejonet", "Jungfrun", "Vågen", "Skorpionen", "Skytten", "Stenbocken", "Vattumannen", "Fiskarna"];

foreach ($tecknen as $key => $tecken) {
    $i = $key + 1;
    $url = "https://www.tidningennara.se/astrologi/veckans-horoskop/?sign=$i";

    /* Ladda ned webbsiddan med file_get_contents */
    $sidan = file_get_contents($url);

    /* Leta rätt på början av horoskopet med strpos*/
    $start = strpos($sidan, "<div class=\"col-xs-7 col-sm-7\">");
    if ($start !== false) {

        /* Leta rätt på slutet av horoskopet med strpos */
        $slut = strpos($sidan, "luckyno", $start);
        if ($slut !== false) {

            /* Plocka ut horoskop-koden med substr */
            $längd = $slut - $start - 43;
            $horoskop = substr($sidan, $start + 31, $längd);

            /* Skriv horoskopet */
            echo "<h2>$tecken</h2>";
            echo $horoskop;
        } else {
            echo "<p>Hittade INTE horoskoptextens slut</p>";
        }

    } else {
        echo "<p>Hittade INTE horoskoptextens start</p>";
    }
}
?>
    </div>
</body>
</html>