<?php
// Initialize sessions
session_start();

// Check if the user is already logged in, if yes then redirect to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}

// Include config file
require_once "db.php";

// Define variables and initialize with empty values
$username = $password = '';
$username_err = $password_err = '';

// Process submitted form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if username is empty
    if (empty(trim($_POST['username']))) {
        $username_err = 'Please enter username.';
    } else {
        $username = trim($_POST['username']);
    }

    // Check if password is empty
    if (empty(trim($_POST['password']))) {
        $password_err = 'Please enter your password.';
    } else {
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = 'SELECT id, username, password FROM users WHERE username = ?';

        if ($stmt = $mysql_db->prepare($sql)) {
            // Set parameter
            $param_username = $username;

            // Bind parameter to statement
            $stmt->bind_param('s', $param_username);

            // Attempt to execute
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if username exists. Verify user exists then verify
                if ($stmt->num_rows == 1) {
                    // Bind result into variables
                    $stmt->bind_result($id, $username, $hashed_password);

                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Start a new session
                            session_start();

                            // Store data in session
                            $_SESSION['loggedin'] = true;
                            $_SESSION['id'] = $id;
                            $_SESSION['username'] = $username;

                            // Redirect to user to page
                            header('location: welcome.php');
                        } else {
                            // Display an error for password mismatch
                            $password_err = 'Invalid password';
                        }
                    }
                } else {
                    $username_err = "Username does not exist.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again.";
            }
            // Close statement
            $stmt->close();
        }

        // Close connection
        $mysql_db->close();
    }
}
?>
