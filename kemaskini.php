<?php
require '../conn.php';

$session_id = $_SESSION['idpelajar'];
$katal = $_POST['katal'];

// Hash the password
$kata = password_hash($katal, PASSWORD_BCRYPT);

// Use prepared statements to update the database
$sql = "UPDATE pelajar SET kata = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $kata);
    $stmt->execute();
    $stmt->close();

    // Redirect to the desired location
    header('Location: pelajar.php');
} else {
    // Handle the error if the prepared statement fails
    echo "Error in prepared statement.";
}
?>
