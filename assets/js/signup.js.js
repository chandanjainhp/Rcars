document.getElementById('signupForm').addEventListener('submit', function (e) {
    const password = document.querySelector('input[name="password"]').value;
    const confirmPassword = document.querySelector('input[name="confirm_password"]').value;
    let valid = true;

    // Clear previous error messages
    document.getElementById('passwordError').style.display = 'none';
    document.getElementById('confirmPasswordError').style.display = 'none';

    // Password validation
    if (password.trim() === '') {
        document.getElementById('passwordError').textContent = 'Please enter a password.';
        document.getElementById('passwordError').style.display = 'block';
        valid = false;
    } else if (password.length < 8) {
        document.getElementById('passwordError').textContent = 'Password must be at least 8 characters long.';
        document.getElementById('passwordError').style.display = 'block';
        valid = false;
    } else if (!/[A-Z]/.test(password)) {
        document.getElementById('passwordError').textContent = 'Password must contain at least one uppercase letter.';
        document.getElementById('passwordError').style.display = 'block';
        valid = false;
    } else if (!/[a-z]/.test(password)) {
        document.getElementById('passwordError').textContent = 'Password must contain at least one lowercase letter.';
        document.getElementById('passwordError').style.display = 'block';
        valid = false;
    } else if (!/[0-9]/.test(password)) {
        document.getElementById('passwordError').textContent = 'Password must contain at least one number.';
        document.getElementById('passwordError').style.display = 'block';
        valid = false;
    } else if (!/[!@#$%^&*]/.test(password)) {
        document.getElementById('passwordError').textContent = 'Password must contain at least one special character.';
        document.getElementById('passwordError').style.display = 'block';
        valid = false;
    }

    // Validate password match
    if (password !== confirmPassword) {
        document.getElementById('confirmPasswordError').textContent = 'Passwords do not match.';
        document.getElementById('confirmPasswordError').style.display = 'block';
        valid = false;
    }

    // If validation fails, prevent form submission
    if (!valid) {
        e.preventDefault();
    }
});
