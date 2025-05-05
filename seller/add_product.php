<?php
session_start();

// Check if seller is logged in
if (!isset($_SESSION['seller_id'])) {
    header('Location: login.php');
    exit();
}

// Initialize variables
$name = $description = $price = $quantity = '';
$name_err = $price_err = $quantity_err = $image_err = '';
$success_msg = $error_msg = '';

// Database configuration
$host = "localhost";
$user = "root";
$password = "bUZweTz8ms_V&w/"; // Replace with your actual password
$database = "eshop";

// Create a new MySQLi connection
$conn = new mysqli($host, $user, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $name = trim($_POST["name"] ?? '');
    $description = trim($_POST["description"] ?? '');
    $price = trim($_POST["price"] ?? '');
    $quantity = trim($_POST["quantity"] ?? '');

    // Validate name
    if (empty($name)) {
        $name_err = "Product name is required.";
    }

    // Validate price
    if (empty($price) || !is_numeric($price) || $price <= 0) {
        $price_err = "Please enter a valid price.";
    }

    // Validate quantity
    if (empty($quantity) || !filter_var($quantity, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]])) {
        $quantity_err = "Please enter a valid quantity.";
    }

    // Handle image upload
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $allowed_types = ["jpg", "jpeg", "png", "gif"];
        $file_name = $_FILES["image"]["name"];
        $file_tmp = $_FILES["image"]["tmp_name"];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (in_array($file_ext, $allowed_types)) {
            $new_file_name = uniqid("img_", true) . "." . $file_ext;
            $upload_path = "uploads/" . $new_file_name;
            if (!move_uploaded_file($file_tmp, $upload_path)) {
                $image_err = "Failed to upload image.";
            }
        } else {
            $image_err = "Invalid image format. Allowed types: jpg, jpeg, png, gif.";
        }
    } else {
        $image_err = "Product image is required.";
    }

    // If no errors, insert into database
    if (empty($name_err) && empty($price_err) && empty($quantity_err) && empty($image_err)) {
        $stmt = $conn->prepare("INSERT INTO products (seller_id, name, description, price, quantity, image) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issdis", $_SESSION['seller_id'], $name, $description, $price, $quantity, $new_file_name);

        if ($stmt->execute()) {
            $success_msg = "Product added successfully!";
            // Clear form fields
            $name = $description = $price = $quantity = '';
        } else {
            $error_msg = "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}
?>
