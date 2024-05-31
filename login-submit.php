<?php
session_start();
include 'includes/db_connect.inc'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form inputs
    if (empty($email) || empty($password)) {
        $_SESSION['message'] = [
            'type' => 'danger',
            'text' => 'Both fields are required!'
        ];
    } else {
        // Check if the email exists in the database
        $stmt = $conn->prepare("SELECT id, fullName, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['fullName'];
                $_SESSION['message'] = [
                    'type' => 'success',
                    'text' => 'Login successful!'
                ];
                header('Location: index.php'); // Redirect to the home page or another protected page
                exit();
            } else {
                $_SESSION['message'] = [
                    'type' => 'danger',
                    'text' => 'Incorrect password!'
                ];
            }
        } else {
            $_SESSION['message'] = [
                'type' => 'danger',
                'text' => 'Email not registered!'
            ];
        }
    }

    // Redirect back to the login page
    header('Location: login.php');
    exit();
}
