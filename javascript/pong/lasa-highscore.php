<?php
include_once "./konfig-db.php";

/* SQL för att spara inlägget i tabellen */
$sql = "SELECT * FROM pong ORDER BY highscore DESC LIMIT 10";

/* Kör SQL */
$result = $conn->query($sql);

if (!$result) {
    die("Kunde inte köra sql-frågan: $conn->error");
} else {
    echo "<table>";
    while ($rad = $result->fetch_assoc()) {
        $datum = new DateTime($rad[datum]);
        echo "<tr>
        <td>$rad[namn]</td>
        <td>$rad[highscore]</td>
        <td>" . $datum->format('d/m Y') . "</td>
        </tr>";
    }
    echo "</table>";
}
