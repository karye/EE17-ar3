<?php
include_once "./konfig-db.php";

/* Ta emot post-data */
$namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);
$poäng = filter_input(INPUT_POST, "poäng", FILTER_SANITIZE_STRING);

/* Om post-data innehåller något */
if ($namn && $poäng) {
    echo "Mottaget $namn, $poäng, ";

    /* SQL för att spara inlägget i tabellen */
    $sql = "UPDATE pong SET highscore='$poäng' WHERE namn='$namn'";

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
