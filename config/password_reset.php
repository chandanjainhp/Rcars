<?php
session_start();
require_once "db.php"; // Include your database connection

// Initialize variables
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Process form when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate new password
    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Please enter a new password.";
    } elseif (strlen(trim($_POST["new_password"])) < 6) {
        $new_password_err = "Password must be at least 6 characters.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm your password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if ($new_password !== $confirm_password) {
            $confirm_password_err = "Passwords do not match.";
        }
    }

    // Check for errors before updating the password
    if (empty($new_password_err) && empty($confirm_password_err)) {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        
        // Update the password in the database
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        $params = array($hashed_password, $_SESSION['user_id']);

        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        } else {
            // Redirect to success page
            header("location: success.php");
            exit;
        }
    }
}
?>
