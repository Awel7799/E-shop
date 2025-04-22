
$pass = "bUZweTz8ms_V&w/";  // Default XAMPP password (empty)

<?php
$servername = "localhost:3306"; // Replace with your server name if different
$username = "root"; // Replace with your database username
$password = "bUZweTz8ms_V&w/"; // Replace with your database password if set
$dbname = "Eshop"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

