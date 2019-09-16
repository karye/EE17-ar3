<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>If-satser</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $lösenord = "12345";
    if ($lösenord != "12345") {
        echo "<p>Dom är inte lika!</p>";
    } else {
        echo "<p>Dom är lika!</p>";
    }

    /* 
    Laugh on Monday, laugh for danger.
    Laugh on Tuesday, kiss a stranger.
    Laugh on Wednesday, laugh for a letter.
    Laugh on Thursday, something better.
    Laugh on Friday, laugh for sorrow.
    Laugh on Saturday, joy tomorrow.
    */
    $idag = date("l");
    var_dump($idag);

    if ($idag == "Monday") {
        echo "<p>Laugh on Monday, laugh for danger.</p>";
    } elseif ($idag == "Tuesday") {
        echo "<p>Laugh on Tuesday, kiss a stranger.</p>";
    } elseif ($idag == "Wednesday") {
        echo "<p>Laugh on Wednesday, laugh for a letter.</p>";
    } elseif ($idag == "Thursday") {
        echo "<p>Laugh on Thursday, something better.</p>";
    } elseif ($idag == "Friday") {
        echo "<p>Laugh on Friday, laugh for sorrow.</p>";
    } elseif ($idag == "Saturday") {
        echo "<p>Laugh on Saturday, joy tomorrow.</p>";
    } 
    
    $månad = date("F");
    var_dump($månad);
    $dagensDatum = date("d");
    var_dump("$dagensDatum");

    if ($idag == "Friday" && $dagensDatum == "13") {
        echo "<p>Bäst att hålla sig hemma!</p>";
    } else {
        echo "<p>Kusten är fri!</p>";
    }
    
    /* Halloween är 31/10 */
    if ($månad == "October" && $dagensDatum == "30") {
        echo "<p>Hurra! Idag är dagen före Halloween.</p>";
    } else {
        echo "<p>Du får vänta lite till.</p>";
    }
    
    if ($idag == "Saturday" || $idag == "Sunday") {
        echo "<p>Skönt! Idag är helg.</p>";
    } else {
        $antalDagarTillHelg = 5 - date("N");
        echo "<p>Suck, du får vänta $antalDagarTillHelg dagar till nästa helg.</p>";
    }
    


    ?>
</body>
</html>