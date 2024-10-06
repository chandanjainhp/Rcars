<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/password_reset.css"> <!-- Separate CSS file -->
</head>
<body>
    <main class="container wrapper">
        <section>
            <h2>Reset Password</h2>
            <p>Please fill out this form to reset your password.</p>
            <form id="resetPasswordForm" action="reset_password.php" method="post">
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" required>
                    <span class="error-message" id="newPasswordError"></span>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                    <span class="error-message" id="confirmPasswordError"></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-primary" value="Submit">
                    <a class="btn btn-block btn-link bg-light" href="welcome.php">Cancel</a>
                </div>
            </form>
        </section>
    </main>
    <?php require_once("commons/footer.php"); ?>
    <script src="assets/js/password_reset.js"></script> <!-- Separate JavaScript file -->
</body>
</html>
