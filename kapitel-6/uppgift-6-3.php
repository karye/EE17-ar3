<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    /* Konstruera ett reguljärt uttryck som matchar en sträng som innehåller ett "t" följt av ett eller två "o". Endast små bokstäver ska matchas. */

    $text = "det var en gång en ...";
    if (preg_match("/[Dd]et var en gång/", $text)) {
        echo "<p>Texten innehåller ordet 'Det var en gång en'.</p>";
    } else {
        echo "<p>Texten innehåller INTE ordet 'Det var en gång en'.</p>";
    }

    if (preg_match("/Det var en gång/i", $text)) {
        echo "<p>Texten innehåller ordet 'Det var en gång en'.</p>";
    } else {
        echo "<p>Texten innehåller INTE ordet 'Det var en gång en'.</p>";
    }

    
    ?>
</body>
</html>