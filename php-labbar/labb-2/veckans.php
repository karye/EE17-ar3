<?php
/*
 * Hämta veckasn horoskop från https://www.tidningennara.se/astrologi/veckans-horoskop/?sign=0
 *
 * PHP version 7
 * @category   Webbscrapping
 * @author     Karim Ryde <karye.webb@gmail.com>
 * @license    PHP CC
 */
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Veckans horoskop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
    $veckonr = date('W');
    echo "<h1>Veckans horoskop v$veckonr</h1>";
    
    /* Skapa array av horoskoptecken */
    $tecknen = ["Väduren", "Oxen", "Tvillingarna", "Kräftan", "Lejonet", "Jungfrun", "Vågen", "Skorpionen", "Skytten", "Stenbocken", "Vattumannen", "Fiskarna"];
    
    /* Hämta sidorna med horoskopen en-och-en */
    foreach ($tecknen as $index => $tecken) {
        $i = $index + 1;
    
        /* Hämta sidan */
        $sidan = file_get_contents("https://www.tidningennara.se/astrologi/veckans-horoskop/?sign=$i");
    
        /* Sök början på horoskoptexten */
        $start = strpos($sidan, "<div class=\"col-xs-7 col-sm-7\">") + 33;
        if ($start !== false) {
    
            /* Sök slutet på horoskoptexten */
            $slut = strpos($sidan, "</div>", $start) + 6;
            if ($slut !== false) {
    
                /* Plocka ut horoskoptexten */
                $horoskop = substr($sidan, $start, $slut - $start);
                echo "<h2>$tecken</h2>";
                echo $horoskop;
            } else {
                echo "<p>Hittade inte var horoskopet slutade!</p>";
            }
        } else {
            echo "<p>Hittade inte var horoskopet började!</p>";
        }
    }
    ?>
    </div>
</body>
</html>