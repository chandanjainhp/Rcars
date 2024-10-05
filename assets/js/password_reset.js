document.getElementById('resetPasswordForm').addEventListener('submit', function (e) {
    const newPassword = document.getElementById('new_password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    let valid = true;

    // Clear previous error messages
    document.getElementById('newPasswordError').textContent = '';
    document.getElementById('confirmPasswordError').textContent = '';

    // Password validation
    if (newPassword.trim() === '') {
        document.getElementById('newPasswordError').textContent = 'Please enter a new password.';
        valid = false;
    } else if (newPassword.length < 8) {
        document.getElementById('newPasswordError').textContent = 'Password must be at least 8 characters long.';
        valid = false;
    } else if (!/[A-Z]/.test(newPassword)) {
        document.getElementById('newPasswordError').textContent = 'Password must contain at least one uppercase letter.';
        valid = false;
    } else if (!/[a-z]/.test(newPassword)) {
        document.getElementById('newPasswordError').textContent = 'Password must contain at least one lowercase letter.';
        valid = false;
    } else if (!/[0-9]/.test(newPassword)) {
        document.getElementById('newPasswordError').textContent = 'Password must contain at least one number.';
        valid = false;
    } else if (!/[!@#$%^&*]/.test(newPassword)) {
        document.getElementById('newPasswordError').textContent = 'Password must contain at least one special character.';
        valid = false;
    }

    // Confirm password validation
    if (confirmPassword.trim() === '') {
        document.getElementById('confirmPasswordError').textContent = 'Please confirm your new password.';
        valid = false;
    } else if (newPassword !== confirmPassword) {
        document.getElementById('confirmPasswordError').textContent = 'Passwords do not match.';
        valid = false;
    }

    // If validation fails, prevent form submission
    if (!valid) {
        e.preventDefault();
    }
});
