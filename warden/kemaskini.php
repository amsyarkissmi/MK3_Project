<?php
require '../conn.php';

$idpelajar = $_POST['idpelajar'];
$warden = $_POST['warden'];
$namapelajar = $_POST['namapelajar'];
$nokppelajar = $_POST['nokppelajar'];




$sql = "UPDATE pelajar
        SET warden = '$warden',namapelajar = '$namapelajar', nokppelajar = '$nokppelajar'
        WHERE idpelajar = $idpelajar";
$conn->query($sql);

header('location: index.php?menu=pelajar');