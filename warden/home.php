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
$sql = "
    SELECT
        COUNT(DISTINCT pelajar.nokppelajar) AS bilangan_pelajar,
        COUNT(DISTINCT peralatan.nosiri) AS bilangan_peralatan
    FROM
        pelajar
    LEFT JOIN
        peralatan ON pelajar.idpelajar = peralatan.pelajar;
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $bilangan_pelajar = $row["bilangan_pelajar"];
    $bilangan_peralatan = $row["bilangan_peralatan"];
} else {
    $bilangan_pelajar = 0;
    $bilangan_peralatan = 0;
}

$conn->close();
?>

<h2>Informasi Bilangan Pelajar dan Peralatan</h2>
<p>Jumlah Pelajar: <?php echo $bilangan_pelajar; ?></p>
<p>Jumlah Peralatan: <?php echo $bilangan_peralatan; ?></p>
</body>
</html>
