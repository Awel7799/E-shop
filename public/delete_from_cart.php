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

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
  $id = intval($_POST["id"]);

  $query = "DELETE FROM cart WHERE id = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    echo "Product removed from cart.";
  } else {
    echo "Failed to remove product.";
  }

  $stmt->close();
  $conn->close();
} else {
  echo "Invalid request.";
}
