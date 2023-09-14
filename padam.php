<?php
require '../conn.php';

if(isset($_GET['idp'])) {
    $nosiri = $_GET['idp']; // Use 'idp' to get the 'nosiri' value

    $sql = "DELETE FROM peralatan WHERE nosiri = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nosiri); // Assuming "nosiri" is a string

    if ($stmt->execute()) {
        // Record deleted successfully
        header('location: pelajar.php?menu=pelajar');
    } else {
        // Error occurred while deleting
        echo "Error: " . $conn->error;
    }

    $stmt->close();
} else {
    // Handle the case when 'idp' is not set in the URL
    // You can redirect or display an error message
    echo "Invalid request";
}
?>
