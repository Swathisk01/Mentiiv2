<?php
// get_entry.php
// session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "mentii";

// // Connect to the database
// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     echo json_encode(['success' => false, 'error' => 'Database connection failed: ' . $conn->connect_error]);
//     exit;
// }

// // Ensure user is logged in
// if (!isset($_SESSION['user_id'])) {
//     echo json_encode(['success' => false, 'error' => 'User not logged in']);
//     exit;
// }

// if (isset($_GET['date'])) {
//     $userId = $_SESSION['user_id'];
//     $date = $_GET['date'];

//     $stmt = $conn->prepare("SELECT entry FROM journal_entries WHERE user_id = ? AND entry_date = ?");
//     if (!$stmt) {
//         echo json_encode(['success' => false, 'error' => 'Prepare failed: ' . $conn->error]);
//         exit;
//     }
    
//     $stmt->bind_param("is", $userId, $date);
//     $stmt->execute();
//     $result = $stmt->get_result();
    
//     if ($row = $result->fetch_assoc()) {
//         echo json_encode(['success' => true, 'entry' => $row['entry']]);
//     } else {
//         echo json_encode(['success' => true, 'entry' => '']);
//     }
    
//     $stmt->close();
// } else {
//     echo json_encode(['success' => false, 'error' => 'No date provided']);
// }

// $conn->close();
?>