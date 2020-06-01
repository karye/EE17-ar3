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
    <title>Uppgift 5.1</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Kontrollera inmatning</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label>Namn</label>
            <input type="text" name="namn" required>
            <label>Adress</label>
            <input type="text" name="adress" required>
            <label>Postnr</label>
            <input type="text" name="postnr" required>
            <label>Postort</label>
            <input type="text" name="postort" required>
            <label>Epost</label>
            <input type="email" name="epost" required>
            <button class="primary">Skicka</button>
        </form>
        <?php

        /* Ta emot data som skickas */
        $namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
        $adress = filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_STRING);
        $postnr = filter_input(INPUT_POST, 'postnr', FILTER_SANITIZE_STRING);
        $postort = filter_input(INPUT_POST, 'postort', FILTER_SANITIZE_STRING);
        $epost = filter_input(INPUT_POST, 'epost', FILTER_SANITIZE_STRING);
        if ($namn && $adress && $postnr && $postort && $epost) {

            /* Kontrollera att alla fälten innehåller minst 3 tecken */
            if (strlen($namn) < 3) {
                echo "<p>Namnet är för kort, vg försök igen!</p>";
            }
            if (strlen($adress) < 3) {
                echo "<p>Adressen är för kort, vg försök igen!</p>";
            }
            if (strlen($postort) < 3) {
                echo "<p>Postorten är för kort, vg försök igen!</p>";
            }

            /* Kontrollera att postnumret innehåller 5 tecken */
            if (strlen($postort) != 5) {
                echo "<p>Postnr är fel längd. Postnr skall vara 5 tecken långt, vg försök igen!</p>";
            }

            /* Kontrollera att postnumret innehåller endast siffror */
            if (!is_numeric($postnr)) {
                echo "<p>Postnr skall endast innehålla siffror, vg försök igen!</p>";
            }

            /* Kontrollera att epostadressen är minst sex tecken lång. */
            if (strlen($epost) < 6) {
                echo "<p>Epost skall vara minst sex tecken lång, vg försök igen!</p>";
            }

            /* Kontrollera att epostadressen innehåller ett @, och minst en punkt. */
            if (!strstr($epost, '@')) {
                echo "<p>Epost skall innehålla ett @-tecken, vg försök igen!</p>";
            }
            if (!strstr($epost, '.')) {
                echo "<p>Epost skall innehålla minst en punkt, vg försök igen!</p>";
            }

            /* Rensa bort mellanslag i postnumret och därmed tillåter postnummer inskrivna enligt formen "415 22" */
            $postnr = str_replace( ' ', '', $postnr);
        }
        ?>
    </div>
</body>
</html>