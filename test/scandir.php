<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skanna en katalog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="kontainer">
        <h1>Skanna katalog</h1>
        <?php
$katalog = './shop-bilder/cpu';

$filer = scandir($katalog);

echo "<table class=\"striped\">";
echo "<tr><th></th><th>Namn</th></tr>";

foreach ($filer as $fil) {

    /* Visa fa-ikoner för dokument och undermappar */
    if (is_dir($fil)) {

        /* Visa inte ”." och ”.." */
        if ($fil != '.' && $fil != '..') {
            echo "<tr><td><i class=\"fa fa-folder\"></i></td><td>$fil</td></tr>";
        }
    } else {

        /* Visa bilden om filformat ”.jpg”, ”.png”, ”.gif" */
        $info = pathinfo("./$fil");
        if ($info['extension'] == 'jpg') {
            echo "<tr><td><img src=\"$katalog/$fil\"></td><td>$fil</td></tr>";
        } else {
            echo "<tr><td><i class=\"fa fa-file\"></i></td><td>$fil</td></tr>";
        }
    }
}
echo "</table>";
?>
    </div>
</body>
</html>