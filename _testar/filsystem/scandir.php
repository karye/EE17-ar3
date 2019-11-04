<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skanna en katalog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Katalog</h1>
        <?php
$katalog = "../shop";

/* Hämta katalogens innehåll */
$filer = scandir($katalog);

echo "<table>";
echo "<tr><th></th><th>Namn</th></tr>";

foreach ($filer as $fil) {
    /* Visa fa-ikoner för dokument och undermappar */
    if (is_dir("$katalog/$fil")) {
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