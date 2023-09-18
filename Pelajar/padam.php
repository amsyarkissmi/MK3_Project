<?php
require '../conn.php';

if(isset($_GET['idp'])) {
    $nosiri = $_GET['idp'];

    $sql = "DELETE FROM peralatan WHERE nosiri = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nosiri);

    if ($stmt->execute()) {

        header('location: index.php?menu=home');
    } else {

        echo "Error: " . $conn->error;
    }

    $stmt->close();
} else {

    echo "Invalid request";
}
?>
