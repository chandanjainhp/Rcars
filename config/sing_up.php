<?php
// Include your database connection file
require_once "db.php";

// Initialize variables
$full_name = $email = $password = $confirm_password = "";
$full_name_err = $email_err = $password_err = $confirm_password_err = "";

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
    }

    // Validate password
    if (empty(trim($_POST['password']))) {
        $password_err = "Password cannot be empty.";
    } else {
        $password = trim($_POST['password']);
    }

    // Validate confirm password
    if (empty(trim($_POST['confirm_password']))) {
        $confirm_password_err = "Please confirm your password.";
    } else {
        $confirm_password = trim($_POST['confirm_password']);
        if ($password !== $confirm_password) {
            $confirm_password_err = "Passwords do not match.";
        }
    }

    // Check for errors before inserting into the database
    if (empty($full_name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";

        if ($stmt = $mysql_db->prepare($sql)) {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Bind parameters
            $stmt->bind_param('sss', $full_name, $email, $hashed_password);

            // Attempt to execute the statement
            if ($stmt->execute()) {
                // Redirect to login page after successful registration
                header("location: login.php");
                exit;
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $mysql_db->close();
}
?>
