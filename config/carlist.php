<?php
header('Content-Type: application/json');

$servername = "your_server";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, model, price, image FROM cars"; // Adjust this query
$result = $conn->query($sql);

$cars = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $cars[] = $row;
    }
}

$conn->close();

echo json_encode($cars);
?>
