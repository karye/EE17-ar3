<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Strängfunktioner</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Vanliga strängfunktioner</h1>
        <?php
        /* Dela upp en sträng i dess tecken */
        $land = "Sverige";
        $delar = str_split($land);

        /* Skriver ut ett tecken per rad */
        foreach ($delar as $bokstav) {
            echo "<p>$bokstav</p>";
        }

        /* Dela upp en mening i dess ord */
        $mening = "Sverige är ett land i norden";
        $delar = explode(' ' ,$mening);

        /* Skriver ut ett ord per rad */
        foreach ($delar as $ord) {
            echo "<p>$ord</p>";
        }

        /* Rensa bort tomrum i text (början och slut) */
        $mening = "  Sverige är ett land i norden   ";
        $trimmadMening = trim($mening);
        echo "<p>_$trimmadMening\_</p>";

        /* Hur lång är en sträng? */
        $mening = "Sverige är ett land i norden";
        $längd = strlen($mening);
        echo "<p>Meningen är $längd tecken lång.</p>";

        /* Plocka ut delar ur en sträng */
        $url = "https://classroom.google.com/c/Mzc1MzQyODMwNjZa";
        $start = substr($url, 0, 4);
        echo "<p>De 4 första tecknen är $start</p>";
        $del =  substr($url, 18, 6);
        echo "<p>Del är $start</p>";

        /* Hitta en text i en text */
        if (strstr($url, "netflix")) {
            echo "<p>netflix hittades i texten</p>";
        } else {
            echo "<p>netflix hittades inte i texten</p>";
        }
        
        /* Var finns ordet i texten? */
        $position = strpos($url, "google");
        echo "<p>Ordet google finns på position $position</p>";

        /* Ersätt ett ord med ett annat i en text */
        $nyUrl = str_replace("google", "netflix", $url);
        echo "<p>$nyUrl</p>";
        ?>
    </div>
</body>
</html>