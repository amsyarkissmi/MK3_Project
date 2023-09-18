<?php
require 'conn.php';

$idp = $_POST['idp'];
$kk = $_POST['kk'];

if ($idp == 'admin') {
    $sql = 'SELECT * FROM admin';
    $row = $conn->query($sql)->fetch_object();
    if (password_verify($kk, $row->kata)) {
        $_SESSION['idp'] = 'admin';
        header('location: admin/');
    } else {
        ?>
        <script>
            alert('Maaf, Kata Laluan Salah')
            window.location = './';
        </script>
        <?php
    }
} else {
# jika bukan admin, cari dalam table warden
    $sql = "SELECT idwarden,nokpwarden, kata FROM warden WHERE nokpwarden = '$idp'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_object();
        if (password_verify($kk, $row->kata)) {
            $_SESSION['idwarden'] = $row->idwarden;
            header('location: warden/');
        } else {
            ?>
            <script>
                alert('Maaf, kata laluan salah.');
                window.location = './';
            </script>
            <?php
        }
    } else {
# jika bukan warden, cari dalam table pelajar
        $sql = "SELECT idpelajar,nokppelajar, kata FROM pelajar WHERE nokppelajar = '$idp'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_object();
            if (password_verify($kk, $row->kata)) {
                $_SESSION['idpelajar'] = $row->idpelajar;
                header('location: pelajar/');
            } else {
                ?>
                <script>
                    alert('Maaf, kata laluan salah.');
                    window.location = './';
                </script>

                <?php
            }
        } else {
            ?>
            <script>
                alert('Maaf, ID pengguna/kata laluan salah.');
                window.location = './';
            </script>
            <?php
        }
    }
}
