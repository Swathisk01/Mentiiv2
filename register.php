<?php
include 'db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username already exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        echo "Username is already taken. Please choose a different one.";
    } else {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $hashedPassword]);

        echo "Registration successful! You can now <a href='login.html'>log in</a>.";
    }
}
?>
