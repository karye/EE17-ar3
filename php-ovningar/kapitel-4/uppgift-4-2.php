<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 4.2</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Sorterad namnlista i tabell</h1>
        <form action="./uppgift-4-2.php" method="POST">
            <label>Namnen</label>
            <input type="text" name="namn1" required>
            <input type="text" name="namn2" required>
            <input type="text" name="namn3" required>
            <input type="text" name="namn4" required>
            <input type="text" name="namn5" required>
            <input type="text" name="namn6" required>
            <input type="text" name="namn7" required>
            <input type="text" name="namn8" required>
            <input type="text" name="namn9" required>
            <input type="text" name="namn10" required>
    
            <button class="primary">Skicka</button>
        </form>
        <?php

        /* Ta emot data som skickas */
        $namn = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($namn) {
            //var_dump($namn);
            
            /* Sortera i bokstavsordning */
            sort($namn);

            /* Loopa igenom arrayen och skriv namnen */
            $radNr = 1;
            echo "<table>";
            foreach ($namn as $namnet) {

                /* Är radNr udda eller jämt? */
                if ($radNr % 2) {
                    echo "<tr><td>$radNr</td><td>$namnet</td></tr>";
                } else {
                    echo "<tr class=\"grå\"><td>$radNr</td><td>$namnet</td></tr>";
                }

                /* Räkna upp */
                $radNr++;
            }
            echo "</table>";
        }
        
        ?>
    </div>
</body>
</html>