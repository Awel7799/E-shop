<?php
$servername = "localhost";      // usually localhost for local dev
$dbUsername = "root";           // Laragon default username
$dbPassword = "";               // Laragon default has no password
$dbName = "eshopdb"; // Change to your actual DB name

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
