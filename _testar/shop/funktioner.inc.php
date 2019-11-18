<?php
/*
* PHP version 7
* @category   Hjälpfunktioner
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<?php
function vara($bilden) {
    preg_match("/-[0-9]*.\w*$/", $bilden, $match);
    $längd = strlen($match[0]) + 1;
    
    /* Plocka ut del före punkten */
    $vara = substr($bilden, 0, -$längd);

    return $vara;
}
function pris($bilden) {
    preg_match("/[0-9]*.\w*$/", $bilden, $match);
    
    /* Plocka ut del före punkten */
    $delar = explode('.', $match[0]);

    return $delar[0];
}
?>