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
    <title>Uppgift 5.5</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Passwordmeter</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label>Lösenord</label>
            <input type="text" name="losen" required>
            <button class="primary">Skicka</button>
        </form>
        <?php

        /* Ta emot data som skickas */
        $losen = filter_input(INPUT_POST, 'losen', FILTER_SANITIZE_STRING);
        $poäng = 0;
        $fel = true;

        if ($losen) {
            /* Tips: trim, strpos, strlen, strstr, explode, substr */
            /* Skall innehålla minst en stor bokstav */
            $versaler = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'Å', 'Ä', 'Ö'];
            foreach ($versaler as $tecken) {
                $pos = strpos($losen, $tecken);
                if ($pos !== false) {
                    $poäng += 1;
                    $fel = false;
                }
            }

            /* Skall innehålla minst en liten bokstav */
            $gemener = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w',  'x', 'y', 'z', 'å', 'ä', 'ö'];
            foreach ($gemener as $tecken) {
                $pos = strpos($losen, $tecken);
                if ($pos !== false) {
                    $poäng += 1;
                    $fel = false;
                }
            }

            /* Skall innehålla minst en siffra */
            $siffror = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            foreach ($siffror as $tecken) {
                $pos = strpos($losen, $tecken);
                if ($pos !== false) {
                    $poäng += 1;
                    $fel = false;
                }
            }

            /* Skall vara minst 8 tecken: strlen */
            if (strlen($losen) >= 8) {
                $poäng += 1;
                $fel = false;
            }

            /* Skall innehålla minst ett specialtecken: #%&¤_*-+@!?()[]$£€ */
            $special = ['#', '%', '&', '¤', '_', '*', '-', '+', '@', '!', '?', '(', ')', '[', ']', '$', '£', '€'];
            foreach ($special as $tecken) {
                $pos = strpos($losen, $tecken);
                if ($pos !== false) {
                    $poäng += 1;
                    $fel = false;
                }
            }

            /* Skriver ut poängen */
            if ($fel) {
                echo "<p>Ditt lösenord uppfyller inte alla kriterier.</p>";
            } else {
                echo "<p>Ditt lösenord fick $poäng poäng.</p>";
            }
        }
        ?>
    </div>
</body>
</html>