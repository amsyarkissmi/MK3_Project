<?php
require 'conn.php';

$idwarden = $_POST['idwarden'];
$katalaluan = $_POST['kata'];

if ($idwarden == 'warden') {
    $sql = 'SELECT * FROM warden';
    $row = $conn->query($sql)->fetch_object();
    if (password_verify($katalaluan, $row->kata)) {
        $_SESSION['idwarden'] = 'warden';
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
    ?>
    <script>
        alert('Maaf, ID pengguna/kata laluan salah.');
        window.location = './';
    </script>
    <?php
}