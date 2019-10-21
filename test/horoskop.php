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
    $html = file_get_contents("https://astro.elle.se/");
    if (preg_match("/<div class=\"o-indenter\">./", $filnamn)) {
        echo "<p>Filnamnet <strong>$filnamn</strong> är INTE korrekt!</p>";
    } else {
        echo "<p>Filnamnet <strong>$filnamn</strong> är korrekt!</p>";
    }
    ?>
</body>
</html>