<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from POST request
    $bookingId = $_POST['bookingId'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Database connection (replace with your own credentials)
    $host = 'localhost'; 
    $user = 'root'; 
    $password = 'root'; 
    $dbname = 'car_rentals'; 

    // Create connection
    $conn = new mysqli($host, $user, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Update booking in the database
    $sql = "UPDATE bookings SET name='$name', email='$email', phone='$phone', address='$address' WHERE booking_id='$bookingId'";

    if ($conn->query($sql) === TRUE) {
        echo 'Booking updated successfully.';
    } else {
        echo 'Error updating booking: ' . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
