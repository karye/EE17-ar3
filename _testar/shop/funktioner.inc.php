<?php
/*
* PHP version 7
* @category   Hjälpfunktioner
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<?php
/* Använder regex för att plocka ut vara och pris
   Se https://www.phpliveregex.com/p/uci */
function vara($bilden) {
    preg_match("/(.*)-([0-9]*).\w*$/", $bilden, $match);
    return $match[1];
}
function pris($bilden) {
    preg_match("/(.*)-([0-9]*).\w*$/", $bilden, $match);
    return $match[2];
}
?>