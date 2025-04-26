<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "bUZweTz8ms_V&w/";
$dbName = "eshop";

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "✅ Database connection successful!<br>";
}

// Check if form data exists first to avoid undefined warnings
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    // get value from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // don't forget password

    // For now, store password as plain text (NOT recommended for real projects, later you should hash it)

    // inserting into database
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location:login_page.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} else {
    echo "No form data received.";
}

$conn->close();
?>
