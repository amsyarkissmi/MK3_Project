<?php
require '../conn.php';
if (!isset($_SESSION['idpelajar'])) header('location: ../');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pelajar</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<a href="index.php?menu=home">Home</a>
<a href="index.php?menu=pass">Tukar Kata Laluan</a>
<a href="../logout.php">LOGOUT</a><br><br>

<?php
$menu = 'home'; #default value
if(isset($_GET['menu'])){
$menu=$_GET['menu'];
}
include "$menu.php";

?>
</body>
</html>