<?php
require 'conn.php';

$idpengguna = $_POST['idpengguna'];
$katalaluan = $_POST['kata'];

if ($idpengguna == 'admin') {
    $sql = 'SELECT * FROM admin';
    $row = $conn->query($sql)->fetch_object();
    if (password_verify($katalaluan, $row->kata)) {
        $_SESSION['idpengguna'] = 'admin';
        header('location: admin/');
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