<?php
require '../conn.php';

$warden = $_POST['warden'];
$namapelajar = $_POST['namapelajar'];
$nokppelajar= $_POST['nokppelajar'];
$kata = $_POST['kata'];

$sql = "INSERT INTO pelajar VALUES(null,'$warden', '$namapelajar', '$nokppelajar', '$kata')";
$conn->query($sql);

header('location: index.php?menu=pelajar');