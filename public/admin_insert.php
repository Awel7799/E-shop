<?php
$servername = "localhost";
$username = "root";
$password = ""; // Laragon has no default password
$dbname = "Eshop"; // replace with your actual DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example values
$adminUsername = "111";
$adminPassword = password_hash("123", PASSWORD_DEFAULT); // Securely hashed password

// Insert into table
$sql = "INSERT INTO admin (password , username) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $adminUsername, $adminPassword);

if ($stmt->execute()) {
    echo "✅ New admin added successfully!";
} else {
    echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
