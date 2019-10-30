<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Datum på svenska</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <?php
    $datum = date("l y F");
    echo "$datum<br>";

    setlocale(LC_ALL, "sv_sv");
    $dagensDatum = strftime("%A %y %B");
    echo ucwords($dagensDatum) . "<br>";

    /* Bygg en veckokalender med idag markerad i fetstil */
?>
</body>
</html>