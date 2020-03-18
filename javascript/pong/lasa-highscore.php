<?php
include_once "./konfig-db.php";

/* SQL för att spara inlägget i tabellen */
$sql = "SELECT * FROM pong ORDER BY highscore DESC LIMIT 10";

/* Kör SQL */
$result = $conn->query($sql);

if (!$result) {
    die("Kunde inte köra sql-frågan: $conn->error");
} else {
    while ($rad = $result->fetch_assoc()) {
        echo "$rad[namn] $rad[highscore]<br>";
    }
}
