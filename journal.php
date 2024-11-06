<?php
// session_start();

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// // For testing purposes, ensure a user is logged in
// if (!isset($_SESSION['user_id'])) {
//     $_SESSION['user_id'] = 1; // Set default user ID for testing
// }

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "mentii";

// // Log function
// function writeLog($message) {
//     $logFile = 'debug.txt';
//     $timestamp = date('Y-m-d H:i:s');
//     file_put_contents($logFile, "[$timestamp] $message\n", FILE_APPEND);
// }

// // Connect to the database
// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     writeLog("Database connection failed: " . $conn->connect_error);
//     echo json_encode(['success' => false, 'error' => 'Database connection failed: ' . $conn->connect_error]);
//     exit;
// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     writeLog("POST request received");
//     writeLog("POST data: " . print_r($_POST, true));
    
//     $userId = $_SESSION['user_id'];
//     $date = isset($_POST['date']) ? $_POST['date'] : null;
//     $entry = isset($_POST['entry']) ? $_POST['entry'] : null;

//     writeLog("User ID: $userId");
//     writeLog("Date: $date");
//     writeLog("Entry: $entry");

//     if ($date && $entry) {
//         // Convert and validate the date
//         $formattedDate = date('Y-m-d', strtotime($date));
        
//         // Prepare statement
//         $stmt = $conn->prepare("INSERT INTO journal_entries (user_id, entry_date, entry) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE entry = VALUES(entry)");
        
//         if (!$stmt) {
//             writeLog("Prepare failed: " . $conn->error);
//             echo json_encode(['success' => false, 'error' => 'Statement preparation failed']);
//             exit;
//         }

//         // Bind parameters
//         $stmt->bind_param("iss", $userId, $formattedDate, $entry);

//         // Execute the statement
//         if ($stmt->execute()) {
//             writeLog("Entry saved successfully");
//             echo json_encode(['success' => true]);
//         } else {
//             writeLog("Execute failed: " . $stmt->error);
//             echo json_encode(['success' => false, 'error' => 'Failed to save entry']);
//         }

//         $stmt->close();
//     } else {
//         writeLog("Missing required parameters");
//         echo json_encode(['success' => false, 'error' => 'Missing date or entry']);
//     }
// } else {
//     writeLog("Invalid request method: " . $_SERVER['REQUEST_METHOD']);
//     echo json_encode(['success' => false, 'error' => 'Invalid request method']);
// }

// $conn->close();
?>


<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mentii";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

function writeLog($message) {
    error_log(date('Y-m-d H:i:s') . ' ' . $message . "\n", 3, 'journal.log');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    writeLog("POST request received");
    writeLog("POST data: " . print_r($_POST, true));

    $userId = $_SESSION['user_id'];
    $date = isset($_POST['date']) ? $_POST['date'] : null;
    $entry = isset($_POST['entry']) ? $_POST['entry'] : null;

    writeLog("User ID: $userId");
    writeLog("Date: $date");
    writeLog("Entry: $entry");

    if ($date && $entry) {
        // Convert and validate the date
        $formattedDate = date('Y-m-d', strtotime($date));

        // Prepare statement
        $stmt = $conn->prepare("INSERT INTO journal_entries (user_id, entry_date, entry) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE entry = VALUES(entry)");

        if (!$stmt) {
            writeLog("Prepare failed: " . $conn->error);
            echo json_encode(['success' => false, 'error' => 'Statement preparation failed']);
            exit;
        }

        // Bind parameters
        $stmt->bind_param("iss", $userId, $formattedDate, $entry);

        // Execute the statement
        if ($stmt->execute()) {
            writeLog("Entry saved successfully");
            echo json_encode(['success' => true]);
        } else {
            writeLog("Execute failed: " . $stmt->error);
            echo json_encode(['success' => false, 'error' => 'Failed to save entry']);
        }

        $stmt->close();
    } else {
        writeLog("Missing required parameters");
        echo json_encode(['success' => false, 'error' => 'Missing date or entry']);
    }
} else {
    writeLog("Invalid request method: " . $_SERVER['REQUEST_METHOD']);
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}

$conn->close();
?>