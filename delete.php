<?php
session_start();
include "includes/db_connect.inc";

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Prepare SQL statement to delete the hike record
    $sql = "DELETE FROM hikes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    // Execute the SQL statement
    if ($stmt->execute()) {
        $_SESSION['message'] = array('type' => 'success', 'text' => 'Hike deleted successfully');
    } else {
        $_SESSION['message'] = array('type' => 'error', 'text' => 'Error deleting hike: ' . $conn->error);
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If ID is not provided, redirect back to add.php
    $_SESSION['message'] = array('type' => 'error', 'text' => 'Hike ID not provided');
}

// Redirect back to add.php
header("Location: user.php");
exit();
?>
