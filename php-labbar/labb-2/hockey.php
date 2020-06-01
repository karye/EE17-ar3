<?php
/*
 * 
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
        echo "<h1>...</h1>";

        /* Hämta sidan */
        $sidan = file_get_contents("...");

        /* Sök början på texten */
        $start = strpos($sidan, "...") ;
        if ($start !== false) {

            /* Sök slutet på texten */
            $slut = strpos($sidan, "...", $start);
            if ($slut !== false) {

                /* Plocka ut texten */
                $texten = substr($sidan, $start, $slut - $start);
                echo "<h2>$tecken</h2>";
                echo $texten;
            } else {
                echo "<p>Hittade inte var texten slutade!</p>";
            }
        } else {
            echo "<p>Hittade inte var texten började!</p>";
        }
        ?>
    </div>
</body>
</html>