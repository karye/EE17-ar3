<?php
/*
*
*
* PHP version 7
* @category   Datumfunktioner
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Datumfunktioner</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Räkna ut ålder</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label>Personnummer</label>
            <input type="text" name="pnr" required>
            <button class="primary">Skicka</button>
        </form>
        <?php
        /* Ta emot data som skickas */
        $pnr = filter_input(INPUT_POST, 'pnr', FILTER_SANITIZE_STRING);
        if ($pnr) {
            /* Datumobjekt när man föddes */
            
            $då = new DateTime($pnr);

            /* Datumobjekt för idag */
            $nu = new DateTime();

            /* Differens mellan dessa två datum */
            $differens = $nu->diff($då);

            /* Plockaålder i läsbar format */
            $antalÅ = $differens->y;
            $antalM = $differens->m;
            $antalD = $differens->d;

            echo "<p>Ditt personnummer är $pnr</p>";
            echo "<p>Du är $antalÅ år och $antalM månader och $antalD dagar gammal.</p>";
        }
        ?>
    </div>
</body>
</html>