<?php
require '../conn.php';
if(!isset($_SESSION['idp'])) header('location: ../');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengurusan Warden</title>
</head>
<body>
<table>
    <tr>
        <td></td>
        <td>
            <a href="index.php?menu=home">Home</a>
            ::
            <a href="index.php?menu=warden">Warden</a>
            ::
            <a href="index.php?menu=cariperalatan">Cari Peralatan</a>
            ::
            <a href="index.php?menu=password">Reset Password</a>
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
