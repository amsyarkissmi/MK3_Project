<?php
require '../conn.php';

$session_id = $_SESSION['idwarden'];
$kata = $_POST['kata'];


$kata = password_hash($kata, PASSWORD_BCRYPT);


$sql = "UPDATE warden SET kata = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $kata);
    $stmt->execute();
    $stmt->close();


    header('Location: index.php');
} else {

    echo "Error in prepared statement.";
}
?>