<?php

/**
 * Enkel blogg modul
 * 
 * PHP version 7
 * @category   OOP klass
 * @author     Karim Ryde <karye.webb@gmail.com>
 * @license    PHP CC
 */

class Blog
{
    private $conn;

    /* Konstruktorn 
    @param $connDb
    */
    public function __construct($connDb)
    {
        $this->conn = $connDb;
    }

    /* Hämta alla inlägg */
    public function läsa()
    {
        /* SQL för spara i en tabell */
        $sql = "SELECT * FROM blog ORDER BY id DESC";

        /* Kör SQL-frågan */
        $resultat = $this->conn->query($sql);

        /* Gick det bra? */
        if ($resultat) {
            return $resultat;
        }

        /* Stäng ned anslutningen */
        $this->conn->close();
    }

    /* Spara ett inlägg i tabellen 
    @param $rubriken
    @param $inlägget
    */
    public function skriva($rubriken, $inlägget)
    {
        /* SQL för spara i en tabell */
        $sql = "INSERT INTO blog SET rubrik='$rubriken', inlagg='$inlägget'";

        /* Kör SQL-frågan */
        $resultat = $this->conn->query($sql);

        /* Gick det bra? */
        if ($resultat) {

            /* Returnerar id på registrerade posten i tabellen */
            return $this->conn->insert_id;
        }

        /* Stäng ned anslutningen */
        $this->conn->close();
    }

    /* Radera ett inlägg i tabellen 
    @param $id
    */
    public function radera($id)
    {
        $sql = "DELETE FROM blog WHERE id = '$id'";
        $resultat = $this->conn->query($sql);

        /* Gick det bra? */
        if ($resultat) {
            return 1;
        }

        /* Stäng ned anslutningen */
        $this->conn->close();
    }

    /* Ändra ett inlägg i tabellen 
    @param $id
    @param $rubrik
    @param $inlägg
    */
    public function uppdatera($id, $rubrik, $inlägg)
    {
        $sql = "UPDATE blog SET rubrik = '$rubrik', inlagg = '$inlägg' WHERE ID = '$id'";
        $resultat = $this->conn->query($sql);

        /* Gick det bra? */
        if ($resultat) {
            return 1;
        }

        /* Stäng ned anslutningen */
        $this->conn->close();
    }
}
