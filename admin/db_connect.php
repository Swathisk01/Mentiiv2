<?php 

$conn = new mysqli('localhost', 'root', '', 'event_db');

if ($conn->connect_error) {
    die("Could not connect to MySQL: " . $conn->connect_error);
}
?>