<?php
include 'db_connect.php';

header('Content-Type: application/json'); // Set response type to JSON

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form inputs
    $user_id = $_POST['user_id'];
    $car_id = $_POST['car_id'];
    $rental_start_date = $_POST['rental_start_date'];
    $rental_end_date = $_POST['rental_end_date'];
    $insurance = isset($_POST['insurance']) ? 1 : 0;
    $gps = isset($_POST['gps']) ? 1 : 0;
    $payment_method = $_POST['payment_method'];
    $terms_agreed = isset($_POST['terms_agreed']) ? 1 : 0;
    $number_of_days = $_POST['number_of_days'];
    $daily_rate = $_POST['daily_rate'];
    $total_price = $_POST['total_price'];

    // Validation
    if (!$terms_agreed) {
        echo json_encode(['success' => false, 'error' => 'Terms must be agreed upon.']);
        exit;
    }

    // Prepare and execute the SQL query
    $stmt = $mysql_db->prepare("
        INSERT INTO bookings (
            user_id, car_id, rental_start_date, rental_end_date, 
            insurance, gps, payment_method, terms_agreed, 
            number_of_days, daily_rate, total_price
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param(
        "iissiiisidd",
        $user_id, $car_id, $rental_start_date, $rental_end_date,
        $insurance, $gps, $payment_method, $terms_agreed,
        $number_of_days, $daily_rate, $total_price
    );

    // Execute and check for errors
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    $stmt->close();
    $mysql_db->close();
}
?>
