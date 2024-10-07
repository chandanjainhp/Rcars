<?php
include 'db_connect.php'; // Include your database connection code
 // Include your database connection

header('Content-Type: application/json');

$query = "SELECT id, model, price, image, details FROM cars WHERE 1=1";

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $mysql_db->real_escape_string($_GET['search']);
    $query .= " AND model LIKE '%$search%'";
}

if (isset($_GET['sort'])) {
    $sort = $_GET['sort'] === 'lowToHigh' ? 'price ASC' : 'price DESC';
    $query .= " ORDER BY $sort";
}

$result = $mysql_db->query($query);
$cars = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $cars[] = $row;
    }
    echo json_encode($cars);
} else {
    echo json_encode([]);
}

$mysql_db->close();
?>
