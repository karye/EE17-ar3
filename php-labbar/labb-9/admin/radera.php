<?php
/*
* PHP version 7
* @category   Blogg med lagring i databas
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
session_start();
include_once $_SERVER["DOCUMENT_ROOT"] . "/_databaser/konfig-db.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="kontainer">
        <h1 class="display-4">Bloggen</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="../lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="../sok.php">Sök</a></li>
                <li class="nav-item"><a class="nav-link" href="./admin.php">Admin</a></li>
                <li class="nav-item"><a class="nav-link active">Radera</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
            </ul>
        </nav>
        <main>
            <?php
            /* Ta emot text från formuläret och spara ned i en textfil. */
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
            $radera = filter_input(INPUT_POST, 'radera', FILTER_SANITIZE_STRING);

            /* 1. Logga in på mysql-servern och välj databas */
            $conn = new mysqli($host, $användare, $lösenord, $databas);

            /* Gick det ansluta? */
            if ($conn->connect_error) {
                die("Kunde inte ansluta till databasen: " . $conn->connect_error);
            } else {
                // echo "<p>Yipee! Gick bra att ansluta.</p>";
            }

            if ($id && !$radera) {
                echo "<p>Inlägg nr $id</p>";

                /* 2. Ställ en SQL-fråga */
                $sql = "SELECT * FROM blog WHERE id = '$id'";
                $result = $conn->query($sql);

                /* Gick det bra? */
                if (!$result) {
                    die("Något blev fel med SQL-satsen.");
                } else {
                    $rad = $result->fetch_assoc();
                    echo "<form action=\"#\" method=\"POST\">";
                    echo "<div class=\"inlagg\">";
                    echo "<h5>Inlägg $id</h5>";
                    echo "<p>$rad[rubrik]</p>";
                    echo "<p>$rad[datum]</p>";
                    echo "<p>$rad[inlagg]</p>";
                    echo "</div>";
                    echo "<button class=\"btn btn-danger\" name=\"radera\" value=\"1\">Radera inlägget</button>";
                    echo "</form>";
                }
            }

            /* När man klickat på knappen */
            if ($id && $radera) {
                
                /* 2. Kör en SQL-fråga */
                $sql = "DELETE FROM blog WHERE id = '$id'";
                $result = $conn->query($sql);

                /* Gick det bra? */
                if (!$result) {
                    die("Något blev fel med SQL-satsen.");
                } else {
                    echo "<p class=\"alert alert-info\">Inlägg $id har raderats!</p>";
                }
            }

            /* 4. Stäng ned anslutningen */
            $conn->close();
            ?>
        </main>
    </div>
</body>
</html>