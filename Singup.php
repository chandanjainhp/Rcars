<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="assests/css/signup.css"> <!-- Separate CSS file -->
</head>

<body>
    <?php require_once("commons/navigation.php"); ?>
    <div class="wrapper">
        <h2 class="text-center">Signup Form</h2>
        <form id="signupForm" action="signup.php" method="POST">
            <div class="input-area">
                <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
                <i class="icon fas fa-user"></i>
                <div class="error error-txt" id="nameError">Name can't be blank</div>
            </div>
            <div class="input-area">
                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                <i class="icon fas fa-envelope"></i>
                <div class="error error-txt" id="emailError">Email can't be blank</div>
            </div>
            <div class="input-area">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <i class="icon fas fa-lock"></i>
                <div class="error error-txt" id="passwordError">Password can't be blank</div>
            </div>
            <div class="input-area">
                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                <i class="icon fas fa-lock"></i>
                <div class="error error-txt" id="confirmPasswordError">Passwords do not match</div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Signup</button>
        </form>
        <div class="text-center mt-3">Already a member? <a href="login.php">Login now</a></div>
    </div>

    <script src="assets/js/signup.js"></script> <!-- Separate JavaScript file -->
</body>

</html>
