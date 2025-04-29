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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get product name and price from the form
    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productPrice = mysqli_real_escape_string($conn, $_POST['price']);
    $productquantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $productcatagory = mysqli_real_escape_string($conn, $_POST['catagory']);

    // Handle the uploaded image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];

        // Set the uploads directory
        $uploadsDir = '../../storage/uploads/';

        // Create unique filename to avoid overwriting
        $imageNewName = uniqid('IMG_', true) . '.' . pathinfo($imageName, PATHINFO_EXTENSION);

        $uploadPath = $uploadsDir . $imageNewName;

        // Move the uploaded file to the uploads directory
        if (move_uploaded_file($imageTmpName, $uploadPath)) {

            // Now insert into the database (store the file path)
            $sql = "INSERT INTO products (name,price ,image,stock_quantity,category) 
                    VALUES ('$productName', '$productPrice', '$uploadPath','$productquantity','$productcatagory')";

            if (mysqli_query($conn, $sql)) {
                header("Location:  product.php");
            } else {
                echo "Error adding product: " . mysqli_error($conn);
            }

        } else {
            echo "Failed to upload the image file.";
        }
    } else {
        echo "No image uploaded or there was an upload error.";
    }
}

$conn->close();
?>