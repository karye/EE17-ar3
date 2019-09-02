<?php
echo "<h1>Vad är datatyper?</h1>";
?>
<p>Vilka datatyper finns det i PHP?</p>
<?php
$förnamn = "Karim";
$ålder = 53;
$telefon = "+467065461212";
$pi = 3.14159;
$harKörkort = true; // true eller false
$harHus = false;
$ee17 = ["Erik", "Marcus", "Gene", "Emil", "Albin", "Carl-Axel", "Pontus"];

echo "<p>$förnamn telefon är $telefon</p>";
echo "<p>Jag kan pi = $pi</p>";
echo "<p>harKörkort = $harKörkort</p>";
echo "<p>harHus = $harHus</p>";
//echo $ee17;
print_r($ee17);
echo $ee17[5];
?>