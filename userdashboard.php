<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentii User Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="script.js" defer></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">User Dashboard</h1>

        <div id="sentiment-analysis" class="mb-6">
            <h2 class="text-xl font-semibold">Sentiment Analysis Results</h2>
            <div id="analysis-results" class="grid gap-4 mt-4">
                <!-- Results will be injected here -->
            </div>
        </div>

        <div id="journal-entries">
            <h2 class="text-xl font-semibold">Your Journal Entries</h2>
            <div id="entries" class="grid gap-4 mt-4">
                <!-- Journal entries will be injected here -->
            </div>
        </div>
    </div>

    <script>

<?php
        session_start();
        if (isset($_SESSION['user_id'])) {
            echo "const userId = " . $_SESSION['user_id'] . ";";
        } else {
            header("Location: login.html"); // Redirect to login if no session
            exit();
        }
        ?>


    </script>    
</body>
</html>
