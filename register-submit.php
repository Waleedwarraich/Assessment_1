<?php
session_start();
include 'includes/db_connect.inc'; // Include your database connection file

// Function to validate email format
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate password (you can customize the regex as per your requirements)
function validatePassword($password) {
    return strlen($password) >= 8;
}

// Function to check if passwords match
function passwordsMatch($password, $confirmPassword) {
    return $password === $confirmPassword;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate form inputs
    if (empty($fullName) || empty($email) || empty($gender) || empty($password) || empty($confirmPassword)) {
        $_SESSION['message'] = [
            'type' => 'error',
            'text' => 'All fields are required!'
        ];
    } elseif (!validateEmail($email)) {
        $_SESSION['message'] = [
            'type' => 'error',
            'text' => 'Invalid email format!'
        ];
    } elseif (!validatePassword($password)) {
        $_SESSION['message'] = [
            'type' => 'error',
            'text' => 'Password must be at least 8 characters long!'
        ];
    } elseif (!passwordsMatch($password, $confirmPassword)) {
        $_SESSION['message'] = [
            'type' => 'error',
            'text' => 'Passwords do not match!'
        ];
    } else {
        // Check if the email already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['message'] = [
                'type' => 'error',
                'text' => 'Email already registered!'
            ];
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Insert the new user into the database
            $stmt = $conn->prepare("INSERT INTO users (fullName, email, gender, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $fullName, $email, $gender, $hashedPassword);

            if ($stmt->execute()) {
                $_SESSION['message'] = [
                    'type' => 'success',
                    'text' => 'Registration successful!'
                ];
            } else {
                $_SESSION['message'] = [
                    'type' => 'error',
                    'text' => 'Registration failed! Please try again.'
                ];
            }
        }
    }

    // Redirect back to the registration page
    header('Location: register.php');
    exit();
}
?>
