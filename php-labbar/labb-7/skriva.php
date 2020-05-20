<?php
/*
* PHP version 7
* @category   Blogg med lagring i databas
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/

session_start();

/* Är användaren inte inloggad? */
if (!isset($_SESSION['login'])) {
    /* Nej, gå till loginsidan */
    header("Location: ./login.php?fran=skriva");
}

error_reporting(E_ALL);
include("./resurser/konfig-db.php");
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>bloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1 class="display-4">Bloggen</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link active" href="./skriva.php">Skriva</a></li>
                <?php if (!isset($_SESSION['login'])) { ?>
                    <li class="nav-item"><a class="nav-link" href="./login.php">Logga in</a></li>
                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link" href="./logout.php">Logga ut</a></li>
                <?php } ?>
            </ul>
        </nav>
        <main>
            <form class="kol2b" action="#" method="post">
                <label>Rubrik</label>
                <input type="text" name="rubrik" required>
                <label>Inlägg</label>
                <textarea class="form-control" name="inlagg" id="inlagg" cols="30" rows="10" required></textarea>
                <button class="btn btn-primary">Spara inlägg</button>
            </form>
            <?php
            /* Ta emot text från formuläret och spara ned i en textfil. */
            $rubrik = filter_input(INPUT_POST, 'rubrik', FILTER_SANITIZE_STRING);
            $inlagg = filter_input(INPUT_POST, 'inlagg', FILTER_SANITIZE_STRING);

            /* Om data finns.. */
            if ($rubrik && $inlagg) {

                /* SQL för att spara inlägget i tabellen */
                $sql = "INSERT INTO blog SET rubrik='$rubrik', inlagg='$inlagg'";

                /* Kör SQL */
                $result = $conn->query($sql);

                if (!$result) {
                    die("<p class=\"alert alert-warning\">Kunde inte köra sql-frågan: $conn->error </p>");
                } else {
                    echo "<p class=\"alert alert-success\">Inlägget sparades!</p>";
                }

                /* Stäng ned databasanslutningen */
                $conn->close();
            }
            ?>
        </main>
    </div>
</body>
</html>