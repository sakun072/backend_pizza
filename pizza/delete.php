<?php
session_start();

if (isset($_GET['id'])) {
    $orderId = $_GET['id'];

    // You should validate $orderId to ensure it's a valid order ID.

    // Assuming you have a database connection in your "condb.php" file, include it here.
    include 'condb.php';

    // Perform the deletion using a prepared statement.
    $stmt = $conn->prepare("DELETE FROM orderamount WHERE omid = ?");
    $stmt->bind_param("i", $orderId);

    if ($stmt->execute()) {
        // Deletion was successful.
        header("Location: showorder.php"); // Redirect back to the order listing page.
        exit();
    } else {
        // Handle the case where the deletion failed, e.g., display an error message.
        echo "Deletion failed. Please try again.";
    }
} else {
    // Handle the case where the 'id' parameter is not set or invalid.
    echo "Invalid request.";
}
