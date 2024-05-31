<?php
session_start();
include "includes/db_connect.inc";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if user_id is set in the session
    if (!isset($_SESSION['user_id'])) {
        $_SESSION['message'] = array('type' => 'error', 'text' => 'User not logged in.');
        header("Location: add.php");
        exit();
    }

    if (empty($_POST['hikeName']) || empty($_POST['description']) || empty($_POST['imageCaption']) || empty($_POST['distance']) || empty($_POST['location']) || empty($_POST['level'])) {
        $_SESSION['message'] = array('type' => 'error', 'text' => 'All fields are required.');
        header("Location: add.php");
        exit();
    }
    // Form data
    $hikeName = $_POST['hikeName'];
    $description = $_POST['description'];
    $imageCaption = $_POST['imageCaption'];
    $distance = $_POST['distance'];
    $location = $_POST['location'];
    $level = $_POST['level'];
    $id=$_POST['hike_id'];
    $user_id = $_SESSION['user_id']; // Retrieve user_id from session

    // Check if a new image file is uploaded
    if (!empty($_FILES["image"]["name"])) {

        // File upload
        $targetDir = "images/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if file is an image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check === false) {
            $_SESSION['message'] = array('type' => 'error', 'text' => 'File is not an image.');
            header("Location: edit.php?id=$id");
            exit();
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            $_SESSION['message'] = array('type' => 'error', 'text' => 'Sorry, your file is too large. Max file size is 500KB.');
            header("Location: edit.php?id=$id");
            exit();
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $_SESSION['message'] = array('type' => 'error', 'text' => 'Sorry, only JPG, JPEG, and PNG files are allowed.');
            header("Location: edit.php?id=$id");
            exit();
        }

        // Upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Update database with new image path
            $image = $targetFile;
        } else {
            $_SESSION['message'] = array('type' => 'error', 'text' => 'Sorry, there was an error uploading your file.');
            header("Location: edit.php?id=$id");
            exit();
        }
    } else {
        // No new image uploaded, use the previous image path stored in the hidden input field

        $hike_id = $_POST['hike_id'];

        // Retrieve the existing hike data from the database using prepared statement
        $sql = "SELECT * FROM hikes WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $hike_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $image = $row['image'];
        } else {
            // Handle case when no hike is found
            $_SESSION['message'] = array('type' => 'error', 'text' => 'Hike not found.');
            header("Location: edit.php?id=$id");
            exit();
        }

        $stmt->close();
    }

    // SQL query to update hike data
    $sql = "UPDATE hikes SET hikename=?, description=?, image=?, caption=?, distance=?, location=?, level=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $hikeName, $description, $image, $imageCaption, $distance, $location, $level, $id);

    // Execute query
    if ($stmt->execute()) {
        $_SESSION['message'] = array('type' => 'success', 'text' => 'Hike data updated successfully');
    } else {
        $_SESSION['message'] = array('type' => 'error', 'text' => 'Error updating hike data: ' . $conn->error);
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back to the form page
    header("Location: user.php");
    exit();
} else {
    // If form is not submitted
    $_SESSION['message'] = array('type' => 'error', 'text' => 'Form submission error.');
    header("Location: index.php");
    exit();
}
?>
