<?php
require '../conn.php';

$namawarden = $_POST['namawarden'];
$nokpwarden = $_POST['nokpwarden'];
$kata = $_POST['nokpwarden'];
$kata2 = password_hash($kata, PASSWORD_BCRYPT);

$sql = "INSERT INTO warden VALUES(null, '$namawarden', '$nokpwarden', '$kata2')";
$conn->query($sql);

header('location: index.php?menu=warden');