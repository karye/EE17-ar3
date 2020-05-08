<?php
$host = "localhost";
$databas = "karim";
$användare = "karim";
$lösenord = "uc2jPmA2jZHijOVT";

// Anslut till databasen
$conn = new mysqli($host, $användare, $lösenord, $databas);

// Om någonting går fel. Avsluta och skriv ett felmeddelandet
if ($conn->connect_error) {
    die("Kunde inte ansluta till databasen: " . $conn->connect_error);
} else {
    //echo "Ansluten till databasen $databas på $host";
}
