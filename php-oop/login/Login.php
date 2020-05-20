<?php

/**
 * En Login klass
 * PHP version 7
 * @category   OOP klass
 * @author     Karim Ryde <karye.webb@gmail.com>
 * @license    PHP CC
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Login
{
    private $conn;

    /* Konstruktorn 
    @param $connDb
    */
    public function __construct($connDb)
    {
        $this->conn = $connDb;
    }

    /* Registrera med användarnamn och lösenord
    @param $user
    @param $pass
    */
    public function registrera($user, $pass)
    {
        /* Skapa en hash på lösenordet */
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        /* SQL för spara i en tabell */
        $sql = "INSERT INTO admin SET anamn='$user', hash='$hash'";

        /* Kör SQL-frågan */
        $resultat = $this->conn->query($sql);

        /* Stäng ned anslutningen */
        $this->conn->close();

        /* Gick det bra? */
        if (!$resultat) {
            trigger_error("Kunde inte köra sql-frågan:" . $this->conn->error, E_USER_ERROR);
        } else {
            return 1;
        }
    }

    /* Kontrollera om användaren finns i tabellen
    @param $user
    @param $pass
    */
    public function kontroll($user, $pass)
    {
        /* SQL för spara i en tabell */
        $sql = "SELECT * FROM admin WHERE anamn='$user'";

        /* Kör SQL-frågan */
        $resultat = $this->conn->query($sql);

        /* Stäng ned anslutningen */
        $this->conn->close();

        /* Gick det bra? */
        if (!$resultat) {
            trigger_error("Kunde inte köra sql-frågan:" . $this->conn->error, E_USER_ERROR);
        } else {
            /* Hittar vi användaren? */
            if ($resultat->num_rows == 0) {
                /* Inte hittat */
                return 0;
            } else {
                /* Hittat, plocka ut raden med data */
                $rad = $resultat->fetch_assoc();

                /* Stämmer lösenordet? */
                if (password_verify($pass, $rad['hash'])) {
                    return 1;
                } else {
                    return 2;
                }
            }
        }
    }
}
