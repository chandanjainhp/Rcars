// Function to validate email format
function isValidEmail(email) {
    // Regular expression for validating email addresses (Gmail format)
    const gmailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
    return gmailRegex.test(email);
}

// Event listener for booking form submission
document.getElementById('bookingDetailsForm').addEventListener('submit', async function (event) {
    event.preventDefault();

    const email = document.getElementById('customerEmail').value;
    
    // Validate email
    if (!isValidEmail(email)) {
        alert('Please enter a valid Gmail address.');
        return;
    }

    const bookingData = {
        bookingId: document.getElementById('bookingId').value,
        name: document.getElementById('customerName').value,
        email: email,
        phone: document.getElementById('customerPhone').value,
        address: document.getElementById('customerAddress').value,
    };

    try {
        const response = await fetch('your_api_endpoint_to_confirm_booking.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(bookingData),
        });
        const result = await response.json();
        if (result.success) {
            document.getElementById('bookingReferenceNumber').innerText = result.referenceNumber;
            document.getElementById('confirmationMessage').classList.remove('d-none');
        } else {
            alert('Booking failed: ' + result.message);
        }
    } catch (error) {
        console.error('Error confirming booking:', error);
    }
});

// Similar validation for the update booking form
document.getElementById('updateBookingForm').addEventListener('submit', async function (event) {
    event.preventDefault();

    const email = document.getElementById('updateCustomerEmail').value;

    // Validate email
    if (!isValidEmail(email)) {
        alert('Please enter a valid Gmail address.');
        return;
    }

    const updateData = {
        bookingId: document.getElementById('idbooking').value,
        name: document.getElementById('updateCustomerName').value,
        email: email,
        phone: document.getElementById('updateCustomerPhone').value,
        address: document.getElementById('updateCustomerAddress').value,
    };

    try {
        const response = await fetch('your_api_endpoint_to_update_booking.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(updateData),
        });
        const result = await response.json();
        alert(result.message);
    } catch (error) {
        console.error('Error updating booking:', error);
    }
});
