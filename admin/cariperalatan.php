<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai Peralatan Elektrik</title>
    <link rel="stylesheet" href="cariperalatan.css">
</head>

<body>
<h1 class="page-heading">Senarai Peralatan Elektrik</h1>

<form action="cariperalatan.php" method="GET" class="search-form">
    <label for="serial_number">Number Siri Peralatan:</label>
    <input type="text" name="serial_number" id="serial_number" required>
    <button type="submit" class="search-button">Search</button>
</form>

<?php

$host = 'localhost';
$user = 'root';
$pswd = '';
$dbname = 'penperel';


$conn = new mysqli($host, $user, $pswd, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['serial_number'])) {
    $serialNumber = $_GET['serial_number'];
    $sql = "SELECT peralatan.*, pelajar.* FROM peralatan
        JOIN pelajar ON peralatan.pelajar = pelajar.idpelajar
                WHERE nosiri = '$serialNumber'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<h2>Equipment Details:</h2>";
        echo "<table>";
        echo "<tr><th>Pelajar</th><th>Nama Pelajar</th><th>Nama Warden</th><th>Jenis Peralatan</th><th>Jenama</th><th>Nombor Siri</th></tr>";
        while ($row = $result->fetch_object()) {
            echo "<tr>";
            echo "<td>" . $row->pelajar . "</td>";
            echo "<td>" . $row->namapelajar . "</td>";
            echo "<td>" . $row->warden . "</td>";
            echo "<td>" . $row->jenisperalatan . "</td>";
            echo "<td>" . $row->jenama . "</td>";
            echo "<td>" . $row->nosiri . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No equipment found with the provided serial number.</p>";
    }
}

$conn->close();
?>
</body>

</html>
