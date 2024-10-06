<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "car_rental";

$mysql_db = new mysqli($servername, $username, $password, $dbname);

if ($mysql_db->connect_error) {
    die("Connection failed: " . $mysql_db->connect_error);
}
?>  