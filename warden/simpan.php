<?php
require '../conn.php';

$warden = $_POST['warden'];
$namapelajar = $_POST['namapelajar'];
$nokppelajar= $_POST['nokppelajar'];
$kata = $_POST['nokppelajar'];

$haziq = password_hash($kata,PASSWORD_BCRYPT);

$sql = "INSERT INTO pelajar VALUES(null,'$warden', '$namapelajar', '$nokppelajar', '$haziq')";
$conn->query($sql);

header('location: index.php?menu=pelajar');