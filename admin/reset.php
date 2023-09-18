<?php
require '../conn.php';

if (isset($_GET['idwarden'])) {
    $idwarden = $_GET['idwarden'];


    $sql = "SELECT nokpwarden FROM warden WHERE idwarden = $idwarden";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nokpwarden = $row['nokpwarden'];

        $kata2 = password_hash($nokpwarden, PASSWORD_BCRYPT);


        $sql = "UPDATE warden SET kata = '$kata2' WHERE idwarden = $idwarden";

        if ($conn->query($sql) === TRUE) {

            echo '<script>alert("Password berhasil direset.");</script>';
            echo '<script>window.location.href = "index.php?menu=warden";</script>';
        } else {

            echo '<script>alert("Error: ' . $sql . '\n' . $conn->error . '");</script>';
            echo '<script>window.location.href = "index.php?menu=warden";</script>';
        }
    } else {

        echo '<script>alert("Data warden tidak ditemukan.");</script>';
        echo '<script>window.location.href = "index.php?menu=warden";</script>';
    }
} else {

    echo '<script>alert("ID warden tidak ditemukan.");</script>';
    echo '<script>window.location.href = "index.php?menu=warden";</script>';
}

$conn->close();
?>
