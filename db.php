<?php 
// // db.php
// $host = 'localhost';      // Database host, usually 'localhost'
// $dbname = 'mentii';    // Replace with your actual database name
// $username = 'root';       // Replace with your MySQL username
// $password = '';           // Replace with your MySQL password (if any)

// // Create a new MySQLi connection
// $conn = new mysqli($host, $username, $password, $dbname);

// // Check the connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
?>


<?php
// db.php
$host = 'localhost';
$dbname = 'mentii';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
