<?php

/**
 * 
 * PHP version 7
 * @category   Blogg med lagring i databas
 * @author     Karim Ryde <karye.webb@gmail.com>
 * @license    PHP CC
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once "./resurser/konfig-db.php";
require_once "./Blog.php";
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="kontainer">
        <h1 class="display-4">Bloggen</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="./lasa-oop.php">Läsa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./skriva-oop.php">Skriva</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./lista-oop.php">Admin</a>
                </li>
            </ul>
        </nav>
        <main>
            <form class="jumbotron" action="#" method="post">
                <label>Rubrik</label>
                <input class="form-control" type="text" name="rubrik" required>
                <label>Inlägg</label>
                <textarea class="form-control" name="inlägg" id="inlagg" cols="30" rows="10" required></textarea>
                <br>
                <button class="btn btn-primary">Registrera inlägg</button>
            </form>
            <?php
            $rubrik = filter_input(INPUT_POST, 'rubrik', FILTER_SANITIZE_STRING);
            $inlägg = filter_input(INPUT_POST, 'inlägg', FILTER_SANITIZE_STRING);

            /* Om vi har tagit emot data då registrera i databasen */
            if ($rubrik && $inlägg) {

                /* Skapa ett blogg-objekt */
                $blog = new Blog($conn);

                /* Hämta alla inlägg */
                $resultat = $blog->skriva($rubrik, $inlägg);

                if ($resultat) {
                    echo "<p class=\"alert alert-success\">Inlägget är sparat</p>";
                }
            }
            ?>
        </main>
    </div>
</body>

</html>