<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift 4.0</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Namnlista</h1>
        <form action="./uppgift-4-0.php" method="POST">
            <label>Namnen</label>
            <input type="text" name="namn[]" required>
            <input type="text" name="namn[]" required>
            <input type="text" name="namn[]" required>
            <input type="text" name="namn[]" required>
            <input type="text" name="namn[]" required>
    
            <button class="primary">Skicka</button>
        </form>
        <?php

        /* Ta emot data som skickas */
        $namn = filter_input_array(INPUT_POST)["namn"];
        if ($namn) {
            //var_dump($namn);
            
            /* Loopa igenom arrayen och skriv namnen */
            foreach ($namn as $namnet) {
                echo "<p>$namnet</p>";
            }
        }
        
        ?>
    </div>
</body>
</html>