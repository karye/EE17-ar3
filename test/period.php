<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
        $begin = new DateTime('2019-10-18');
        $end = new DateTime('2019-12-31');
        $end = $end->modify('+1 day');

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval, $end);

        foreach ($daterange as $date) {
            if ($date->format("N") % 7 == 0) {
                echo $date->format("d") . "<br>";
            } else {
                echo $date->format("d") . " ";
            }
        }
        ?>
    </div>
</body>
</html>