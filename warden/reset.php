<?php
require '../conn.php';

if (isset($_GET['idpelajar'])) {
    $idpelajar = $_GET['idpelajar'];


    $sql = "SELECT nokppelajar FROM pelajar WHERE idpelajar = $idpelajar";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nokppelajar = $row['nokppelajar'];

        $kata2 = password_hash($nokppelajar, PASSWORD_BCRYPT);


        $sql = "UPDATE pelajar SET kata = '$kata2' WHERE idpelajar = $idpelajar";

        if ($conn->query($sql) === TRUE) {

            echo '<script>alert("Password berhasil direset.");</script>';
            echo '<script>window.location.href = "index.php?menu=pelajar";</script>';
        } else {

            echo '<script>alert("Error: ' . $sql . '\n' . $conn->error . '");</script>';
            echo '<script>window.location.href = "index.php?menu=pelajar";</script>';
        }
    } else {

        echo '<script>alert("Data warden tidak ditemukan.");</script>';
        echo '<script>window.location.href = "index.php?menu=pelajar";</script>';
    }
} else {

    echo '<script>alert("ID pelajar tidak ditemukan.");</script>';
    echo '<script>window.location.href = "index.php?menu=pelajar";</script>';
}

$conn->close();
?>
