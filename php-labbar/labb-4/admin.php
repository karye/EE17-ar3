<?php
/*
 * Data från https://pcpartpicker.com/products/cpu/
 *
 * PHP version 7
 * @category   Webbshop
 * @author     Karim Ryde <karye.webb@gmail.com>
 * @license    PHP CC
 */

include_once "./funktioner.inc.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webbshop - steg 1 - cpu</title>
    <link rel="stylesheet" href="./shop.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bygg din PC</h1>
        <h2>Ladda upp en vara</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori">
                <option value="cpu">CPU</option>
                <option value="kylare">Kylare</option>
                <option value="ram">RAM</option>
                <option value="disk">Disk</option>
                <option value="mobo">Moderkort</option>
                <option value="grafikkort">Grafikkort</option>
                <option value="psu">PSU</option>
                <option value="chassi">Chassi</option>
            </select>
            <label for="namn">Namn</label>
            <input type="text" name="namn" id="namn">
            <label for="pris">Pris</label>
            <input type="text" name="pris" id="pris">
            <label for="fil"></label>
            <input type="file" name="fil" id="fil">
            <button>Ladda upp!</button>
        </form>
        <?php
/* Funkade det ladda upp? */

/* Ta emot data */
$kategori = filter_input(INPUT_POST, 'kategori', FILTER_SANITIZE_STRING);
$namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
$pris = filter_input(INPUT_POST, 'pris', FILTER_SANITIZE_STRING);
var_dump($kategori, $namn, $pris);
if ($kategori && $namn && $pris) {
    /* Läs in filen */
    $file = $_FILES['fil'];

    /* Vad är filnamnet? */
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    /* Plocka ut filändelsen */
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    /* Vilka bildtyper tillåter vi? */
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    /* Testa att filtypen är tillåten */
    if (in_array($fileActualExt, $allowed)) {

        /* Testa om det blev något fel */
        if ($fileError === 0) {

            /* Testa filstorleken */
            if ($fileSize < 500000) {

                /* Skapa ett filnamn: tex namn-pris.png */
                $fileNameNew = "$namn-$pris.$fileActualExt";
                $fileDestination = "./shop-bilder/$kategori/$fileNameNew";
var_dump($fileNameNew, $fileDestination);
                /* Äntligen, nu flyttar vi filen in i rätt katalog */
                //move_uploaded_file($fileTmpName, $fileDestination);

                /* Vi hoppar direkt tillbaka till formuläret med ett litet meddelande om att vi lyckades ladda upp bilden */
                //header("Location: index.php?uploadsuccess=1");
            } else {
                echo "<p>Bilden måste vara mindre än 500Kb!</p>";
            }
        } else {
            echo "<p>Något är fel. Filen kunde inte laddas upp!</p>";
        }
    } else {
        echo "<p>Filtypen är ej tillåten!</p>";
    }

} else {

}
?>
    </div>
</body>
</html>