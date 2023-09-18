<?php
require '../conn.php';

$session_id = $_SESSION['idpelajar'];
$katal = $_POST['katal'];


$kata = password_hash($katal, PASSWORD_BCRYPT);


$sql = "UPDATE pelajar SET kata = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $kata);
    $stmt->execute();
    $stmt->close();


    header('Location: index.php?menu=home');
} else {

    echo "Error in prepared statement.";
}
?>
