<?php
require '../conn.php';

$jenisperalatan = $_POST['jenisperalatan'];
$jenama = $_POST['jenama'];
$nosiri = $_POST['nosiri'];

$session_id = $_SESSION['idpelajar'];

$sql = "INSERT INTO peralatan(pelajar,jenisperalatan, jenama, nosiri) VALUES ('$session_id','$jenisperalatan', '$jenama', '$nosiri')";
$conn->query($sql);

header('location: pelajar.php');