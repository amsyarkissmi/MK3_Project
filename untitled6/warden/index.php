<?php
require '../conn.php';
if(!isset($_SESSION['idwarden'])) header('location: ../');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengurusan Senarai Pelajar</title>
</head>
<body>
<table>
    <tr>
        <td>SystemPP</td>
        <td>
            <a href="index.php?menu=home">Home</a>
            ::
            <a href="index.php?menu=pelajar">Senarai Pelajar</a>
            ::
            <a href="index.php?menu=passform">Tukar Katalaluan</a> <!-- Tambah menu Tukar Katalaluan -->
            ::
            <a href="../logout.php">LOGOUT</a>
        </td>
    </tr>
</table>

<?php
$menu = 'home'; #default value
if(isset($_GET['menu'])){
    $menu=$_GET['menu'];
}
include "$menu.php";
?>

</body>
</html>
