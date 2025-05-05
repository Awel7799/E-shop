<?php
$servername = "localhost";      // usually localhost
$dbUsername = "root";           // your DB username
$dbPassword = "bUZweTz8ms_V&w/";               // your DB password
$dbName = "Eshop"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
  }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['id'];
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_image = $_POST['image'];

    // Check if product already in cart
    $check = $conn->prepare("SELECT * FROM cart WHERE product_id = ?");
    $check->bind_param("i", $product_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        // Update quantity
        $conn->query("UPDATE cart SET quantity = quantity + 1 WHERE product_id = $product_id");
    } else {
        // Insert new product
        $stmt = $conn->prepare("INSERT INTO cart (product_id, product_name, product_price, product_image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isds", $product_id, $product_name, $product_price, $product_image);
        $stmt->execute();
    }

    echo "Added to cart successfully";
}
?>
