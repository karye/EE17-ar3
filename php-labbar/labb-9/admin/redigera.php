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
    <title>bloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="kontainer">
        <h1  class="display-4">Bloggen</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="../lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="../sok.php">Sök</a></li>
                <li class="nav-item"><a class="nav-link" href="./admin.php">Admin</a></li>
                <li class="nav-item"><a class="nav-link active">Redigera</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
            </ul>
        </nav>
        <main>
            <?php
            /* Ta emot text från formuläret och spara ned i en textfil. */
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
            $rubrik = filter_input(INPUT_POST, 'rubrik', FILTER_SANITIZE_STRING);
            $inlagg = filter_input(INPUT_POST, 'inlagg', FILTER_SANITIZE_STRING);

            /* 1. Logga in på mysql-servern och välj databas */
            $conn = new mysqli($host, $användare, $lösenord, $databas);

            /* Gick det att ansluta? */
            if ($conn->connect_error) {
                die("Kunde inte ansluta till databasen: " . $conn->connect_error);
            } else {
                // echo "<p>Yipee! Gick bra att ansluta.</p>";
            }

            /* Första gången ta upp inlägget i formuläret */
            if ($id && !$rubrik) {
                echo "<h5>Inlägg nr $id</h5>";

                /* 2. Ställ en SQL-fråga */
                $sql = "SELECT * FROM blog WHERE id = '$id'";
                $result = $conn->query($sql);

                /* Gick det bra? */
                if (!$result) {
                    die("Något blev fel med SQL-satsen.");
                } else {
                    $rad = $result->fetch_assoc();
                    echo "<form action=\"#\" method=\"POST\">";
                    echo "<label>Rubrik</label>";
                    echo "<input type=\"text\" name=\"rubrik\" value=\"$rad[rubrik]\" required>";
                    echo "<input type=\"hidden\" name=\"id\" value=\"$id\" required>";
                    echo "<label>Inlägg</label>";
                    echo "<textarea class=\"form-control\" name=\"inlagg\" id=\"inlagg\" cols=\"30\" rows=\"10\" required>$rad[inlagg]</textarea>";
                    echo "<button class=\"btn btn-warning\">Updatera inlägget</button>";
                    echo "</form>";
                }
            }

            /* Ta emot text från formuläret och spara ned i en textfil. */
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

            /* Andra gången uppdatera inlägget i tabellen */
            if ($rubrik && $inlagg) {

                /* 2. Uppdatera inlägget i tabellen */
                $sql = "UPDATE blog SET rubrik='$rubrik', inlagg='$inlagg' WHERE id='$id'";
                $result = $conn->query($sql);

                /* Gick det bra? */
                if (!$result) {
                    die("Något blev fel med SQL-satsen.");
                } else {
                    echo "<p class=\"alert alert-success\">Inläggets har uppdaterats.</p>";
                }
            }
            ?>
        </main>
    </div>
</body>
</html>