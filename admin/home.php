<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>
<body>
<h1>HOME</h1>


<?php

$sqlWarden = "
    SELECT
        COUNT(*) AS bilangan_warden
    FROM
        warden;
";

$resultWarden = $conn->query($sqlWarden);

if ($resultWarden !== false && $resultWarden->num_rows > 0) {
    $rowWarden = $resultWarden->fetch_assoc();
    $bilangan_warden = $rowWarden["bilangan_warden"];
} else {
    $bilangan_warden = 0;
}


$sqlPeralatan = "
    SELECT
        COUNT(*) AS bilangan_peralatan
    FROM
        peralatan;
";

$resultPeralatan = $conn->query($sqlPeralatan);

if ($resultPeralatan !== false && $resultPeralatan->num_rows > 0) {
    $rowPeralatan = $resultPeralatan->fetch_assoc();
    $bilangan_peralatan = $rowPeralatan["bilangan_peralatan"];
} else {
    $bilangan_peralatan = 0;
}

$conn->close();
?>


<h2>Informasi Bilangan Peralatan dan Warden</h2>
<p>Jumlah Peralatan: <?php echo $bilangan_peralatan; ?></p>
<p>Jumlah Warden: <?php echo $bilangan_warden; ?></p>
</body>
</html>
