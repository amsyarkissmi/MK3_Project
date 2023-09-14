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
    <title>Pelajar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<h2>Senarai Pelajar</h2>

<?php
if(!isset($_GET['edit'])){
    ?>
    <form action="simpan.php" method="post">
        <fieldset>
            <legend>Ubah Maklumat Pelajar </legend>
            <table>
                <tr>
                    <td>Warden </td>
                    <td><input type="text" name="warden" required></td>
                </tr>
                <tr>
                    <td>Nama Pelajar</td>
                    <td><input type="text" name="namapelajar" required></td>
                </tr>
                <tr>
                    <td>No kp pelajar</td>
                    <td><input type="text" name="nokppelajar" required minlength="12" maxlength="12"></td>
                </tr>
                <tr>
                    <td>Katalaluan</td>
                    <td><input type="password" name="kata" required minlength="8" maxlength="250"></td>
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
}else{
    $idpelajar = $_GET['edit'];
    $sql = "SELECT * FROM pelajar WHERE idpelajar = $idpelajar";
    $result = $conn->query($sql);
    $row = $result->fetch_object();
    ?>
    <form action="kemaskini.php" method="post">
        <input type="hidden" name="idpelajar" value="<?php echo $row->idpelajar; ?>">
        <fieldset>
            <legend>Kemaskini Data Pelajar</legend>
            <table>
                <tr>
                    <td>Warden</td>
                    <td><input type="text" name="warden" required value="<?php echo $row->warden; ?>"></td>
                </tr>
                <tr>
                    <td>Nama Pelajar</td>
                    <td><input type="text" name="namapelajar" required value="<?php echo $row->namapelajar; ?>"></td>
                </tr>
                <tr>
                    <td>No. kp Pelajar</td>
                    <td><input type="text" name="nokppelajar" required value="<?php echo $row->nokppelajar; ?>" minlength="12" maxlength="12"></td>
                </tr>
                <tr>
                    <td>Katalaluan</td>
                    <td><input type="password" name="kata" required value="<?php echo $row->kata; ?>" minlength="8" maxlength="250"></td>
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

<table class="table">
    <tr>
        <th>Bil</th>
        <th>Nama Pelajar</th>
        <th>No. Kp Pelajar</th>
        <th>Katalaluan baru</th>
        <th>Warden</th>

    </tr>
    <?php
    $bil = 1;
    $sql = "SELECT * FROM pelajar ORDER BY namapelajar";
    $result = $conn->query($sql);
    while ($row = $result->fetch_object()) {
        ?>
        <tr>
            <td><?php echo $bil++; ?></td>
            <td><?php echo $row->namapelajar; ?></td>
            <td><?php echo $row->nokppelajar; ?></td>
            <td><?php echo $row->kata; ?></td>
            <td><?php echo $row->warden; ?></td>
            <td>
                <a href="index.php?menu=pelajar&edit=<?php echo $row->idpelajar; ?>">Edit</a>
                |
                <a href="padam.php?idpelajar=<?php echo $row->idpelajar; ?>" onclick="return sahkan()">Padam</a>
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
