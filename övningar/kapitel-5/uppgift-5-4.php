<?php
/*
* Gör ett formulär där användaren ska fylla i namn, adress, postnr och postort.
Kontrollera att alla fälten är ifyllda, och innehåller minst 3 tecken.
Kontrollera att postnumret innehåller 5 tecken och att de tecknen endast är siffror.
Bygg på formuläret så att användaren också ska fylla i en epostadress.
Kontrollera sedan att epostadressen innehåller ett @, och minst en punkt.
Kontrollera också att epostadressen är minst sex tecken lång.
Utveckla skriptet i uppgift 6.2 så att det tar bort mellanslag i postnumret och därmed tillåter postnummer inskrivna enligt formen "415 22".
*
* PHP version 7
* @category   Kontrollera inmatning
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 5.4</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Kontrollera inmatning</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label>Epost</label>
            <input type="email" name="epost" required>
            <button class="primary">Skicka</button>
        </form>
        <?php

        /* Ta emot data som skickas */
        $epost = filter_input(INPUT_POST, 'epost', FILTER_SANITIZE_STRING);
        if ($epost) {
            /* Ur epostadressen plocka ut namnet och domänen, enligt formen "namn@domän". Tips: trim, strpos, strlen, strstr, explode, substr */

            /* Lösning med explode() */
            $delar = explode('@', $epost);
            echo "<h3>Lösning med explode()</h3>";
            echo "<p>Namnet är: $delar[0]</p>";
            echo "<p>Domänen är: $delar[1]</p>";

            /* Lösning med strstr() */
            echo "<h3>Lösning med strstr()</h3>";
            echo "<p>Namn är: " . strstr($epost, '@',true) . "</p>";
            echo "<p>Domänen är: " . strstr($epost, '@') . "</p>";
        }
        ?>
    </div>
</body>
</html>