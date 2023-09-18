<?php
require '../conn.php';

$idwarden = $_POST['idwarden'];
$namawarden = $_POST['namawarden'];
$nokpwarden = $_POST['nokpwarden'];
$kata = $_POST['kata'];

$kata2 = password_hash($kata, PASSWORD_BCRYPT);

$sql = "UPDATE warden
        SET namawarden = '$namawarden', nokpwarden = '$nokpwarden', kata = '$kata2'
        WHERE idwarden = $idwarden";
$conn->query($sql);

header('location: index.php?menu=warden');
