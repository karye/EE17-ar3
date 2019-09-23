<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Datum på svenska</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h2>Ålder från personnummer</h2>
        <?php
        /* Läs in data */
        $personnr = $_REQUEST["personnr"];
    
        /* Plocka ut år, månad, dag */
        $personnr = "$personnr";
        $fDatum = new DateTime($personnr);
    
        /* Idag */
        $nu = new DateTime();
    
        /* Skillnaden */
        $skillnad = $nu->diff($fDatum);
    
        /* Plocka ut ålder */
        $ålder = $skillnad->y;
        $månader = $skillnad->m;

        echo "<p>Ditt personnummer är $personnr.</p>";
        echo "<p>Du är $ålder år $månader månader.</p>";
        ?>
    </div>
</body>
</html>