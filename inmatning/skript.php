<?php
/* Tar emot data som skickats */
$förnamn = $_REQUEST["förnamn"];
$efternamn =  $_REQUEST["efternamn"];
$mobil = $_REQUEST["mobil"];
$kön = $_REQUEST["kon"];
$hjälte = $_REQUEST["hjalte"];
$fotbollslag = $_REQUEST["fotbollslag"];
$kommentar = $_REQUEST["kommentar"];
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bekräftelse</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
        /* Skriv ut en snygg bekräftelse */
        echo "<p>Hej $förnamn $efternamn, vi har mottagit din data.</p>";
        echo "<p>Mobil: $mobil</p>";
        echo "<p>Kön: $kön</p>";
        echo "<p>Hjälte: $hjälte</p>";
        echo "<p>Fotbollslag: $fotbollslag</p>";
        echo "<p>Kommentar: $kommentar</p>";
        ?>
    </div>
</body>
</html>