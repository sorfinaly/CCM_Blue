<?php
require_once 'db.php';

// Get user input from the registration form
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Insert the user into the `Users` table
$stmt = $conn->prepare("INSERT INTO bookingsystem.users (username, email, phone, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $email, $phone, $password);
$stmt->execute();

// Check for errors
if ($stmt->execute()) {
    // Registration successful
    header('Location: login.html');
    exit();
} else {
    // Log the error (in a real application, consider logging this to a file)
    error_log("Execute failed: " . $stmt->error);
    echo "Registration failed. Please try again.";
}

// Close the statement and the connection
$stmt->close();
$conn->close();
?>

