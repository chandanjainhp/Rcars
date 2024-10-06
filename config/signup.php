<?php
require_once "db_connect.php"; // Ensure this points to your database connection

// Initialize variables
$full_name = $email = $password = "";
$full_name_err = $email_err = $password_err = "";

// Process the form when it is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate full name
    if (empty(trim($_POST['full_name']))) {
        $full_name_err = "Full name cannot be empty.";
    } else {
        $full_name = trim($_POST['full_name']);
    }

    // Validate email
    if (empty(trim($_POST['email']))) {
        $email_err = "Email cannot be empty.";
    } else {
        $email = trim($_POST['email']);
        // Check if the email is already registered
        $email_check_sql = "SELECT id FROM users WHERE email = ?";
        if ($stmt = $mysql_db->prepare($email_check_sql)) {
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $email_err = "This email is already registered.";
            }
            $stmt->close();
        }
    }

    // Validate password
    if (empty(trim($_POST['password']))) {
        $password_err = "Password cannot be empty.";
    } else {
        $password = trim($_POST['password']);
    }

    // Check for errors before inserting into the database
    if (empty($full_name_err) && empty($email_err) && empty($password_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
        if ($stmt = $mysql_db->prepare($sql)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $full_name, $email, $hashed_password);
            if ($stmt->execute()) {
                header("location: login.php"); // Redirect to login page after successful registration
                exit;
            } else {
                echo "Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }

    // Close connection
    $mysql_db->close();
}
?>
