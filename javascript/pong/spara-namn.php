<?php
include_once "./konfig-db.php";

/* Ta emot post-data */
$namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);

/* Om post-data innehåller något */
if ($namn) {
    echo "Mottaget $namn, ";

    /* SQL för att spara inlägget i tabellen */
    $sql = "INSERT INTO pong SET namn='$namn'";

    /* Kör SQL */
    $result = $conn->query($sql);

    if (!$result) {
        die("Kunde inte köra sql-frågan: $conn->error");
    } else {
        echo "Namnet sparades!";
    }
} else {
    echo "Något blev fel!";
}

/* Stäng ned databasanslutningen */
$conn->close();
