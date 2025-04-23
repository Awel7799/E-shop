<?php
$servername = "localhost";      // usually localhost
$dbUsername = "root";           // your DB username
$dbPassword = "";               // your DB password
$dbName = "eshopdb"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
    echo "✅ Database connection successful!";
}

// Get values from form and store them in variables
$username = $_POST['username'];
$password = $_POST['password'];

// Display for testing (remove this in production)
echo "Username: " . $username . "<br>";
echo "Password: " . $password;
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare and bind the SQL statement
$sql = "INSERT INTO admin (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hashedPassword);


// Execute and check for success
if ($stmt->execute()) {
    header("Location: login_page.php");
        exit();
} else {
    echo "❌ Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();

?>


