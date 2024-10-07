<?php
include 'db_connect.php'; // Include your database connection code

header('Content-Type: application/json');

if (isset($_GET['id'])) {
    $carId = intval($_GET['id']); // Get the car ID from the request
    $stmt = $mysql_db->prepare("SELECT id, model, price, image, details FROM cars WHERE id = ?");
    $stmt->bind_param("i", $carId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $car = $result->fetch_assoc();
        echo json_encode($car);
    } else {
        echo json_encode([]);
    }

    $stmt->close();
} else {
    echo json_encode([]);
}

$mysql_db->close();
?>
