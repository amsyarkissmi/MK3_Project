<?php
require '../conn.php';

$namawarden = $_POST['namawarden'];
$nokpwarden = $_POST['nokpwarden'];
$kata = $_POST['kata'];

$sql = "INSERT INTO warden VALUES(null, '$namawarden', '$nokpwarden', '$kata')";
$conn->query($sql);

header('location: index.php?menu=warden');