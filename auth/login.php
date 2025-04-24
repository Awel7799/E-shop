<?php
$servername = "localhost";      // usually localhost
$dbUsername = "root";           // your DB username
$dbPassword = "bUZweTz8ms_V&w/";               // your DB password
$dbName = "ecommerce_db"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
    echo "✅ Database connection successful!";
}

// Get form values
$username = $_POST['username'];
$password = $_POST['password'];


// Prepare query to find the user
$sql = "SELECT * FROM admin WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    
    // Verify password
    if (password_verify($password, $row['password'])) {
        // Success — redirect to dashboard
        header("Location: ../admin/index.php");
        exit();
    } else {
        echo "❌ Incorrect password.";
    }
} else {
    echo "❌ Username not found.";
}

$stmt->close();
$conn->close();

?>
