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
        $fel = true;
        $vPoäng = 0;
        $gPoäng = 0;
        $sPoäng = 0;
        $spPoäng = 0;
        $lPoäng = 0;

        if ($losen) {
            /* Tips: trim, strpos, strlen, strstr, explode, substr */
            /* Skall innehålla minst en stor bokstav */
            if (preg_match("/[A-ZÅÄÖ]/", $losen) > 0) {
                $vPoäng += 1;
            }
            /* Skall innehålla minst en liten bokstav */
            if (preg_match("/[a-zåäö]/", $losen) > 0) {
                $gPoäng += 1;
            }
            /* Skall innehålla minst en siffra */
            if (preg_match("/[0-9]/", $losen) > 0) {
                $sPoäng += 1;
            }
            /* Skall innehålla minst ett specialtecken: #%&¤_*-+@!?()[]$£€ */
            if (preg_match("/[#%&¤_\*\-\+\@\!\?\(\)\[\]\$£€]/", $losen) > 0) {
                $spPoäng += 1;
            }
            /* Skall vara minst 8 tecken */
            if (preg_match("/^.{8,40}$/", $losen) > 0) {
                $lPoäng += 1;
            }

            echo "<p>Ditt lösenord är: $losen</p>";
            echo "<p>Poängen är: $vPoäng + $gPoäng + $sPoäng + $spPoäng + $lPoäng</p>";
            
            /* Skriver ut poängen */
            if ($vPoäng == 0 || $gPoäng == 0 || $sPoäng == 0 || $spPoäng == 0 || $lPoäng== 0) {
                echo "<p>Lösenordet uppfyller inte alla kriterier.</p>";
            } else {
                $poäng = $vPoäng + $gPoäng + $sPoäng + $spPoäng + $lPoäng;
                echo "<p>Lösenordet fick $poäng poäng.</p>";
            }
        }
        ?>
    </div>
</body>
</html>