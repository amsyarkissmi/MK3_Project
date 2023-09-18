<?php
require '../conn.php';

$session_id = $_SESSION['idwarden'];
$kata = $_POST['kata'];

// Hash the password
$kata = password_hash($kata, PASSWORD_BCRYPT);

// Use prepared statements to update the database
$sql = "UPDATE warden SET kata = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $kata);
    $stmt->execute();
    $stmt->close();

    // Redirect to the desired location
    header('Location: index.php');
} else {
    // Handle the error if the prepared statement fails
    echo "Error in prepared statement.";
}
?>
