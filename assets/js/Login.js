document.getElementById('loginForm').addEventListener('submit', function (e) { 
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    let valid = true;

    // Clear previous error messages
    document.getElementById('usernameError').textContent = '';
    document.getElementById('passwordError').textContent = '';

    // Gmail validation regex
    const gmailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

    // Username validation
    if (username.trim() === '') {
        document.getElementById('usernameError').textContent = 'Please enter your username.';
        valid = false;
    } else if (!gmailRegex.test(username.trim())) {
        document.getElementById('usernameError').textContent = 'Please enter a valid Gmail address.';
        valid = false;
    }

    // Password validation
    if (password.trim() === '') {
        document.getElementById('passwordError').textContent = 'Please enter your password.';
        valid = false;
    } else if (password.length < 8) {
        document.getElementById('passwordError').textContent = 'Password must be at least 8 characters long.';
        valid = false;
    } else if (!/[A-Z]/.test(password)) {
        document.getElementById('passwordError').textContent = 'Password must contain at least one uppercase letter.';
        valid = false;
    } else if (!/[a-z]/.test(password)) {
        document.getElementById('passwordError').textContent = 'Password must contain at least one lowercase letter.';
        valid = false;
    } else if (!/[0-9]/.test(password)) {
        document.getElementById('passwordError').textContent = 'Password must contain at least one number.';
        valid = false;
    } else if (!/[!@#$%^&*]/.test(password)) {
        document.getElementById('passwordError').textContent = 'Password must contain at least one special character.';
        valid = false;
    }

    // If validation fails, prevent form submission
    if (!valid) {
        e.preventDefault();
    } else {
        // Form is valid, redirect to index.php after submission
        // You might want to change the action of the form in the HTML if necessary
        document.getElementById('loginForm').action = 'index.php'; // Ensure your form action points to the correct file
    }
});
