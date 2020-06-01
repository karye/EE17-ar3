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
}

/* 
CREATE TABLE blogg (
  id int(11) NOT NULL AUTO_INCREMENT,
  rubrik varchar(100) NOT NULL,
  inlagg text NOT NULL,
  tidstampel timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB;
*/
?>
