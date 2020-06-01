<?php
/*
* PHP version 7
* @category   Hämta data i JSON-format
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chuck Norris skämt</title>
    <link rel="stylesheet" href="../android-studio/">
</head>
<body>
    <div class="kontainer">
        <h1>Chuck Norris skämt</h1>
        <?php
        /* Tjänsten */
        $url = "https://api.chucknorris.io/jokes/random";
    
        /* Anropa apiet */
        $json = file_get_contents($url);
        
        /* Avkoda JSON */
        $jsonData = json_decode($json);
    
        /* Plocka ut skämtet */
        $skämtet = $jsonData->value;

        /* Plocka ut bilden */
        $bilden = $jsonData->icon_url;
    
        /* Skriv ut skämtet */
        echo "<blockquote><img src=\"$bilden\" alt=\"Chuck Norris\">
        $skämtet<footer>Chuck Norris</footer></blockquote>";

        ?>
    </div>
</body>
</html>