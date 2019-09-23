<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loopar</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    /* Skriv ut tio tal 1..10 */
    echo "<p>";
    for ($i = 0; $i < 10; $i++) { 
        echo "steg $i, ";
    }
    echo "</p>";

    echo "<p>Steg: ";
    for ($i = 0; $i < 10; $i++) { 
        echo " $i, ";
    }
    echo "</p>";

    /* Multiplikationstabellen för 10 */
    echo "<p>";
    for ($i = 0; $i < 10; $i++) {
        $i10 = $i * 10;
        echo " $i * 10 = $i10<br>";
    }
    echo "</p>";

    echo "<table>";
    echo "<tr>
            <th>Talet</th><th>talet ggr 10</th>
          </tr>";
    for ($i = 0; $i < 10; $i++) {
        $i10 = $i * 10;
        echo "  <tr>
                    <td>$i</td><td>$i10</td>
                </tr>";
    }
    echo "</table>";

    /* Räkna ned: 10, 9, 8, 7, 6, 5, 4, 3, 2, 1 */
    echo "<table>";
    echo "<tr>
            <th>Talet</th>
          </tr>";
    for ($i = 10; $i > 0; $i--) {
        $i10 = $i * 10;
        echo "  <tr>
                    <td>$i</td>
                </tr>";
    }
    echo "</table>";

    /* Räkna ned: 100, 81, 64, 49, 36, 25, 16, 9, 4, 1 */
    echo "<table>";
    echo "<tr>
            <th>Kvadraten</th>
          </tr>";
        $i = 10;
    while ($i > 1) {
        $i2 = $i * $i;
        echo "  <tr>
                    <td>$i2</td>
                </tr>";
        $i--;
    }
    echo "</table>";
    ?>
</body>
</html>