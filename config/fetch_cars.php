<?php
require_once 'db_connect.php';

$sql = "SELECT id, model, price, image, details FROM cars";
$result = $conn->query($sql);

$cars = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $cars[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($cars);

$conn->close();
?>

