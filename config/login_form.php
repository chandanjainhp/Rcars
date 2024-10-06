 // Ensure this points to your database connection

<?php
require_once "db_connect.php";
// Initialize variables
$username = $password = "";
$username_err = $password_err = "";

// Process the form when it is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate username
    if (empty(trim($_POST['username']))) {
        $username_err = "Please enter your username.";
    } else {
        $username = trim($_POST['username']);
    }

    // Validate password
    if (empty(trim($_POST['password']))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST['password']);
    }

    // Check for errors before querying the database
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, password FROM users WHERE email = ?";

        if ($stmt = $mysql_db->prepare($sql)) {
            // Bind parameters
            $stmt->bind_param('s', $username);

            // Attempt to execute the statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if the user exists
                if ($stmt->num_rows == 1) {
                    // Bind the result
                    $stmt->bind_result($id, $hashed_password);
                    if ($stmt->fetch()) {
                        // Verify password
                        if (password_verify($password, $hashed_password)) {
                            // Start a new session
                            session_start();
                            $_SESSION['id'] = $id; // Store user ID in session
                            header("location: welcome.php"); // Redirect to welcome page
                            exit;
                        } else {
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    $username_err = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $mysql_db->close();
}
?>
