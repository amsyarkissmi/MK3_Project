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
<?php
if (!isset($_GET['edit'])) {
    ?>
    <a href="pass.php">Tukar Kata Laluan</a>
    <a href="../logout.php">LOGOUT</a><br><br>
    <form action="simpan.php" method="post">
        <fieldset>
            <legend>Daftar Peralatan Anda</legend>
            <table>
                <tr>
                    <td>Jenis Peralatan</td>
                    <td><input type="text" name="jenisperalatan" required minlength="12" maxlength="12"></td>
                </tr>
                <tr>
                    <td>Jenama</td>
                    <td><input type="text" name="jenama" required minlength="5" maxlength="10"></td>
                </tr>
                <tr>
                    <td>No Siri</td>
                    <td><input type="text" name="nosiri" required minlength="5" maxlength="10"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">SIMPAN</button>
                        <button type="reset">BATAL</button>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
    <?php
}
?>
<h1>Senarai Peralatan Anda</h1>


<table class="table" border="1">
    <tr>
        <th>Bil</th>
        <th>Warden</th>
        <th>Id Pelajar</th>
        <th>Nama</th>
        <th>Jenis Peralatan</th>
        <th>Jenama</th>
        <th>No Siri</th>
    </tr>
    <?php
    $bil = 1;
    $sql = "SELECT peralatan.*, pelajar.* FROM peralatan
        JOIN pelajar ON peralatan.pelajar = pelajar.idpelajar
        WHERE peralatan.pelajar = '" . $_SESSION['idpelajar'] . "'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_object()) {
        ?>
        <tr>
            <td><?php echo $bil++; ?></td>
            <td><?php echo $row->warden; ?></td>
            <td><?php echo $row->pelajar; ?></td>
            <td><?php echo $row->namapelajar; ?></td>
            <td><?php echo $row->jenisperalatan; ?></td>
            <td><?php echo $row->jenama; ?></td>
            <td><?php echo $row->nosiri; ?></td>
            <td>
                <a href="padam.php?idp=<?php echo $row->nosiri; ?>" onclick="return sahkan()">Padam</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<script>
    function sahkan() {
        return confirm('Adakah anda pasti?');
    }
</script>
</body>
</html>