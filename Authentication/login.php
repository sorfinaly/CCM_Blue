<?php
session_start();
include 'db.php';

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query to retrieve user data
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        $hashed_password = $user_data["password"];

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Login successful, start session and redirect to dashboard
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["username"] = $user_data["username"];
            header("Location: ../1. Homepage/Homepage.html");
            exit;
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "Email not found";
    }
}
?>
