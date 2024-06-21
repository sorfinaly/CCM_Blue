<?php
session_start();
include 'C:/xampp/htdocs/CCM_Blue/Authentication/db.php';


// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO contactus (name, email, subject, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $subject, $message);

// Execute the statement
if ($stmt->execute()) {
    echo json_encode(['message' => 'Booking successfully submitted!']);
    header("Location: ../1. Homepage/Homepage.html");
    exit(); // Ensure script termination after redirection
} else {
    echo "Error: " . $stmt->error;
}


?>