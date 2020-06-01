<?php
/*
* Skriv en webbapp som tar en text och omvandlar den till morsekod. 
* Se https://onlinetexttools.com/convert-text-to-morse och https://morsealfabetet.se. 
* Lägg till ljudspelare se https://codepen.io/cople/pen/zZLJOz
*
* PHP version 7
* @category   Omvandla text till morsekod
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 4.5</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Omvandla tal till morsekod</h1>
        <form action="./uppgift-4-5.php" method="POST">
            <label>Texten</label>
            <textarea name="texten" cols="30" rows="10" required></textarea>
            <button class="primary">Skicka</button>
        </form>
        <?php

        /* Ta emot data som skickas */
        $texten = filter_input(INPUT_POST, 'texten', FILTER_SANITIZE_STRING);
        if ($texten) {

            /* Morsealfabetet */
            $morse['A'] = '.-';
            $morse['B'] = '-...';
            $morse['C'] = '-.-.';
            $morse['D'] = '-..';
            $morse['E'] = '.';
            $morse['F'] = '..-.';
            $morse['G'] = '--.';
            $morse['H'] = '....';
            $morse['I'] = '..';
            $morse['J'] = '.---';
            $morse['K'] = '-.-';
            $morse['L'] = '.-..';
            $morse['M'] = '--';
            $morse['N'] = '-.';
            $morse['O'] = '---';
            $morse['P'] = '.--.';
            $morse['Q'] = '--.-';
            $morse['R'] = '.-.';
            $morse['S'] = '...';
            $morse['T'] = '-';
            $morse['U'] = '.--';
            $morse['V'] = '...-';
            $morse['W'] = '.--';
            $morse['X'] = '-..-';
            $morse['Y'] = '-.--';
            $morse['Z'] = '--..';
            $morse['Å'] = '.--.-';
            $morse['Ä'] = '.-.-';
            $morse['Ö'] = '---.';
            $morse[' '] = ' ';

            /* Dela upp texten i dess bokstäver */
            $texten = mb_strtoupper($texten);
            //$delar = str_split($texten);
            $delar = preg_split('/(?<!^)(?!$)/u', $texten);
            //var_dump($delar);

            /* Skriv ut texten i morsekod */
            echo "<form id=\"demo\"><label>$texten</label><input type=\"text\" pattern=\"[.\- ]+\" name=\"code\" value=\"";
            foreach ($delar as $bokstav) {

                /* Om tecknet finns i morsealfabetet skriv ut morsekoden */
                if (array_key_exists($bokstav, $morse)) {
                    echo "$morse[$bokstav]";
                }
            }
            echo "\"><button>Spela upp</button></form>";
        }
        ?>
    </div>
    <script src="./morse.js"></script>
</body>
</html>