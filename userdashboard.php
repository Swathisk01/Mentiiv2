<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentii User Dashboard</title>
   
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="script.js" defer></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">User Dashboard</h1>

        <div id="sentiment-analysis" class="mb-6">
            <h2 class="text-xl font-semibold">Sentiment Analysis Results</h2>
            <div id="analysis-results" class="grid gap-4 mt-4">
                
            </div>
        </div>

        <div id="journal-entries">
            <h2 class="text-xl font-semibold">Your Journal Entries</h2>
            <div id="entries" class="grid gap-4 mt-4">
               - Journal entries will be injected here -->
                <?php
//session_start(); // Start the session to access session variables
// $_SESSION['user_id'] = $loggedInUserId; // Set this to the actual logged-in user's ID.

// function fetchJournalEntriesByUserId() {
//     // Check if the user ID is set in the session
//     if (!isset($_SESSION['user_id'])) {
//         echo "User not logged in.";
//         return;
//     }

//     $userId = $_SESSION['user_id'];

//     // Database connection settings
//     $host = 'localhost';
//     $db   = 'mentii';
//     $user = 'root';
//     $pass = '';

//     // Connect to the database
//     try {
//         $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
//         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//         // Prepare the SQL statement
//         $stmt = $pdo->prepare("SELECT entry_id, entry_content, entry_date FROM journal_entries WHERE user_id = :userId");
//         $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);

//         // Execute the statement
//         $stmt->execute();

//         // Fetch results
//         $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);

//         // Display the results or return them for further processing
//         foreach ($entries as $entry) {
//             echo "Entry ID: " . $entry['entry_id'] . "<br>";
//             echo "Content: " . $entry['entry_content'] . "<br>";
//             echo "Date: " . $entry['entry_date'] . "<br><br>";
//         }
//     } catch (PDOException $e) {
//         echo "Error: " . $e->getMessage();
//     }
// }

// // Call the function to fetch entries
// fetchJournalEntriesByUserId();
//  ?>
             <!-- </div>
        </div>
     </div>
     <script> -->

<?php
//         session_start();
//         if (isset($_SESSION['user_id'])) {
//             echo "const userId = " . $_SESSION['user_id'] . ";";
//         } else {
//             header("Location: login.html"); // Redirect to login if no session
//             exit();
//         }
        ?>


    <!-- </script>    
</body>
</html>--> 

<?php
session_start(); // Start the session to access session variables

// Redirect to login page if no session is found
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Set user ID from the session for use in the dashboard
$userId = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f0f7f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        
        #dashboard {
            max-width: 800px;
            margin: auto;
        }

        h2 {
            text-align: center;
            font-size: 1.8rem;
            color: #333;
        }

        h1 {
            text-align: center;
            font-size: 1.8rem;
            color: #2a9d8f;
        }
       
       

    </style>
<body>

    <div id="dashboard">
    <h1 class="text-xl font-semibold">User dashboard</h1>
    <div id="journal-entries">
            <h2 class="text-xl font-semibold">Your Journal Entries</h2>
            <div id="entries" class="grid gap-4 mt-4">
        <!-- Journal entries will be injected here -->
        <?php
        function fetchJournalEntriesByUserId() {
            global $userId;

            // Database connection settings
            $host = 'localhost';
            $db   = 'mentii';
            $user = 'root';
            $pass = '';

            // Connect to the database
            try {
                $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Prepare the SQL statement
                $stmt = $pdo->prepare("SELECT id, entry, entry_date FROM journal_entries WHERE user_id = :userId");
                $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);

                // Execute the statement
                $stmt->execute();

                // Fetch results
                $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Display the results
                foreach ($entries as $entry) {
                    echo "Entry ID: " . $entry['id'] . "<br>";
                    echo "Content: " . $entry['entry'] . "<br>";
                    echo "Date: " . $entry['entry_date'] . "<br><br>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        // Call the function to fetch entries
        fetchJournalEntriesByUserId();
        ?>
    </div>
    </div>
        </div>
    

    <script>
        const userId = <?php echo json_encode($userId); ?>;
        console.log("User ID:", userId);
    </script>

</body>
</html>
