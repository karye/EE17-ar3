<?php
/*
* PHP version 7
* @category   PHP grunder: syntax, kommentarer, variabler, escape...
* @author     karim
* @license    PHP CC
*/
?>
<?php
echo "<h1>";
echo "Hello World!"; //kjlk lk
echo "</h1>";

/* Nu testar vi enkel fnutt */
echo "<h2>";
echo 'Hello It\'s nice to see you!';
echo "</h2>";

/* Skapar några variabler */
$namn = "Karim";
$mittEfternamn = "Ryde";
$ålder = 53;
$gatuAddress = "Follingbogatan 26";

echo $namn;
echo "<br>";
echo $mittEfternamn;

/* Hur man sätter ihop text */
echo "Hej!, Mitt namn är " . $namn . ", mitt efternamn är " . $mittEfternamn .  "<br>";
echo "Hej!, Mitt namn är " . $namn . ", min ålder är " . $ålder . "<br>";

/* Hur man sätter ihop text smartast */
echo "Hej!, Mitt namn är $namn , hag bor på $gatuAddress<br>";
echo 'Hej!, Mitt namn är $namn , hag bor på $gatuAddress<br>';





