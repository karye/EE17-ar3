<?php
/*
* PHP version 7
* @category   Blogg med fillagring
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
session_start();

error_reporting(E_ALL);
include("./resurser/konfig-db.php");
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1 class="display-4">Bloggen</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
                <?php if (!isset($_SESSION['login'])) { ?>
                <li class="nav-item"><a class="nav-link" href="./login.php">Logga in</a></li>
                <?php } else { ?>
                <li class="nav-item"><a class="nav-link" href="./logout.php">Logga ut</a></li>
                <?php } ?>
            </ul>
        </nav>
        <main>
            <?php

            /* SQL-frågan */
            $query = "SELECT * FROM blogg";

            /* Kör SQL-frågan */
            $result = $conn->query($query);

            /* Gick det inte bra? Om inte skriv felmeddelande */
            if (!$result) {
                "<p class=\"alert alert-warning\">Kunde inte köra sql-frågan: $conn->error </p>";
            }

            /* Hämta alla inlägg en-och-en */
            while ($row = $result->fetch_assoc()) {
                echo "<article>";
                echo "<h4>" . $row['rubrik'] . "</h4>";
                echo "<h5>" . $row['tidstampel'] . "</h5>";
                echo "<p>" . $row['inlagg'] . "</p>";
                echo "</article>";
            }

            /* Stäng ned databasanslutningen */
            $conn->close();
            ?>
        </main>
    </div>
</body>
</html>