<?php
$servername = "localhost";      // usually localhost
$dbUsername = "root";           // your DB username
$dbPassword = "bUZweTz8ms_V&w/";               // your DB password
$dbName = "eshop"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
    echo "✅ Database connection successful!";
}

// Check if form data exists first to avoid undefined warnings
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    // get value from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // don't forget password
}
// Search for the user with that email
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Email found
    $row = $result->fetch_assoc();
    $stored_password = $row['password']; // password from DB

    // Compare passwords
    if ($password === $stored_password) {
        header("Location:../admin/index.php");
    } else {
        header("Location: login_page.php?error=incorrect_password");
        exit();
    }
} else {
    header("Location: login_page.php?error=No user found with that email");
    exit();
}

$conn->close();
?>
