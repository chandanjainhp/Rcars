<?php
// Ensure all errors are displayed (for debugging purposes, remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection
require_once 'db_connect.php';

// Log received POST data for debugging
error_log("Received POST data: " . print_r($_POST, true));

// Fetch POST data from the JavaScript request
$data = $_POST;

// Validate that all required fields are present
if (!isset($data['car_id']) || empty($data['car_id'])) {
    die(json_encode(['success' => false, 'message' => 'Car ID is required']));
}

// Prepare SQL query to insert booking details
$sql = "INSERT INTO bookings (car_id, total_price, pickup_date, return_date, insurance, gps, payment_method, name, email, phone) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Convert insurance and GPS options to 1/0 (boolean) values
$insurance = isset($data['insurance']) ? 1 : 0;
$gps = isset($data['gps']) ? 1 : 0;

// Bind parameters (matching the placeholders in the SQL query)
$stmt->bind_param("idssiiisss", 
    $data['car_id'], 
    $data['total_price'], 
    $data['pickup_date'], 
    $data['return_date'], 
    $insurance,
    $gps,
    $data['payment_method'], 
    $data['name'], 
    $data['email'], 
    $data['phone']
);

// Initialize response array
$response = ['success' => false, 'message' => '', 'booking_id' => null];

try {
    // Execute the statement
    if ($stmt->execute()) {
        // If successful, return booking ID
        $response['success'] = true;
        $response['message'] = 'Booking successful!';
        $response['booking_id'] = $stmt->insert_id;
    } else {
        // If there was an error, throw an exception
        throw new Exception($stmt->error);
    }
} catch (Exception $e) {
    // Catch and log any errors
    $response['message'] = 'Error: ' . $e->getMessage();
    error_log("Database error: " . $e->getMessage());
}

// Close the statement and connection
$stmt->close();
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
