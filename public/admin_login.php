<?php
// Database connection parameters
$host = "localhost";
$dbname = "ecommerce_db";  // Replace with your database name
$user = "root";  // Default XAMPP username
$pass = "bUZweTz8ms_V&w/";  // Default XAMPP password (empty)

// Create connection using PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected to the database successfully.<br>";

    // Insert a password (hashed for security) into the `admin` table
    $username = "admin";  // Username to insert
    $password = "yourpassword";  // Plain text password

    // Hash the password before storing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL insert statement
    $stmt = $pdo->prepare("INSERT INTO admin (username, password) VALUES (:username, :password)");

    // Bind parameters
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashedPassword);

    // Execute the statement
    $stmt->execute();

    echo "Password inserted successfully.<br>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
