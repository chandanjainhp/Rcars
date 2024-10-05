<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css"> <!-- Separate CSS file -->
</head>

<body>
    <main>
        <section class="container wrapper">
            <h2 class="display-4 pt-3">Login</h2>
            <p class="text-center">Please fill this form to create an account.</p>
            <form id="loginForm" action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                    <span class="help-block" id="usernameError"></span>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    <span class="help-block" id="passwordError"></span>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-outline-primary" value="Login">
                </div>
                <p>Don't have an account? <a href="register.php">Sign up</a>.</p>
            </form>
        </section>
    </main>

    <script src="assets/js/login.js"></script> <!-- Separate JavaScript file -->
</body>

</html>
