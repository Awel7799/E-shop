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
// Get the product id from URL
if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);

    // Delete query
    $sql = "DELETE FROM products WHERE product_id = $product_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the dashboard after deletion
        header("Location: product.php"); // <-- Change this to your actual dashboard filename
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid product ID.";
}

$conn->close();
?>
