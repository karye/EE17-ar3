<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kalender</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer kol2">
        <?php
        $datum = "2019-08-26";
        $slutDatum = "2019-12-31";

        $month = date("m", strtotime($datum));
        $pMonth = $month;

        setlocale(LC_ALL, "sv_sv");

        echo "<table class=\"month\">";
        echo "<caption>" . ucwords(strftime("%B", strtotime($datum))) . "</caption>";
        echo "<tr><th></th><th>Måndag</th><th>Tisdag</th><th>Onsdag</th><th>Torsdag</th><th>Fredag</th><th>Lördag</th><th>Söndag</th></tr>";

        /* Fyll upp veckan */
        $dag = date("N", strtotime($datum));
        echo "<tr>";
        for ($i = 1; $i < $dag; $i++) {
            echo "<td></td>";
        }

        while (strtotime($datum) < strtotime($slutDatum)) {
            $datum = date("Y-m-d", strtotime($datum));

            /* Fyll upp veckan */
            $dag = date("N", strtotime($datum));
            if (date("d", strtotime($datum)) == 1) {
                echo "<tr><th></th>";
                for ($i = 1; $i < $dag; $i++) {
                    echo "<td></td>";
                }
            }

            if ($dag == 7) {
                echo "<td class=\"helg\">" . date("d", strtotime($datum)) . "</td></tr>";
            } else {
                if ($dag == 6) {
                    echo "<td class=\"helg\">" . date("d", strtotime($datum)) . "</td>";
                } else {
                    if ($dag == 1) {
                        echo "<td class=\"vecka\">" . date("W", strtotime($datum)) . "</td><td>" . date("d", strtotime($datum)) . "</td>";
                    } else {
                        echo "<td>" . date("d", strtotime($datum)) . "</td>";
                    }
                }
            }

            $datum = date("Y-m-d", strtotime("+1 day", strtotime($datum)));
            $month = date("m", strtotime($datum));

            if ($month != $pMonth) {
                echo "</table><table class=\"month\">";
                echo "<caption>" . ucwords(strftime("%B", strtotime($datum))) . "</caption>";
                echo "<tr><th></th><th>Måndag</th><th>Tisdag</th><th>Onsdag</th><th>Torsdag</th><th>Fredag</th><th>Lördag</th><th>Söndag</th></tr>";
            }
            $pMonth = $month;
        }
        echo "</table>";
        ?>
    </div>
</body>
</html>