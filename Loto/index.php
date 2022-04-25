<!DOCTYPE html>
<?php
    function tirageLoto():array {
        $tirage = [];
        do {
            $nb = rand(1, 49);
            if (in_array($nb, $tirage)) {
                continue;
            }
            array_push($tirage, $nb);
        } while (count($tirage)< 6);
        sort($tirage);
        return $tirage;
    }
    $tirage = tirageLoto();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loto</title>
</head>
<body>
    <!-- <ul>
    <?php foreach ($tirage as $value) { ?>
        <li><?php echo $value;?></li>
    <?php } ?>
    </ul> -->
    <ul>
    <?php foreach ($tirage as $value) : ?>
        <li><?php echo $value;?></li>
    <?php endforeach ?>
    </ul>
</body>
</html>