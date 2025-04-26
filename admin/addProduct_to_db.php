<?php
// Step 1: Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "bUZweTz8ms_V&w/"; // your MySQL password
$dbname = "eshop"; // replace with your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
  echo"database conneced";
}
// Step 2: Get form data
$name = $_POST['name'];
$price = $_POST['price'];
$imageName = $_FILES['image']['name'];
$imageTmp = $_FILES['image']['tmp_name'];

// Step 3: Move uploaded image to a folder
$targetDir = "uploads/";
if (!is_dir($targetDir)) {
  mkdir($targetDir);
}
$imagePath = $targetDir . basename($imageName);

if (move_uploaded_file($imageTmp, $imagePath)) {
  
  // Step 4: Insert into database (assuming user_id is known, e.g., 1 for admin)
  $user_id = 1; // example admin ID

  $stmt = $conn->prepare("INSERT INTO products (name, price, image, user_id) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("sdsi", $name, $price, $imagePath, $user_id);

  if ($stmt->execute()) {
    echo "Product added successfully!";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
} else {
  echo "Failed to upload image.";
}

$conn->close();
?>
