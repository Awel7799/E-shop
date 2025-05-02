<?php
// Start the session at the very beginning
session_start();

// Check if the seller is logged in
if (!isset($_SESSION['seller_id'])) {
    header('Location: login.php');
    exit();
}

// Initialize variables
$name = $description = $price = $quantity = '';
$name_err = $description_err = $price_err = $quantity_err = $image_err = '';
$success_msg = $error_msg = '';

// Database configuration
$host = "localhost";
$user = "root";
$password = "1394"; // Replace with your actual password
$database = "seller"; // Replace with your actual database name

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

    // Validate description
    if (empty($description)) {
        $description_err = "Product description is required.";
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
            $upload_dir = __DIR__ . "/uploads/";

            // Ensure the uploads directory exists
            if (!is_dir($upload_dir)) {
                if (!mkdir($upload_dir, 0755, true)) {
                    $image_err = "Failed to create upload directory.";
                }
            }

            $upload_path = $upload_dir . $new_file_name;

            if (empty($image_err) && !move_uploaded_file($file_tmp, $upload_path)) {
                $image_err = "Failed to upload image.";
            }
        } else {
            $image_err = "Invalid image format. Allowed types: jpg, jpeg, png, gif.";
        }
    } else {
        $image_err = "Product image is required.";
    }

    // If no errors, insert into database
    if (empty($name_err) && empty($description_err) && empty($price_err) && empty($quantity_err) && empty($image_err)) {
        $stmt = $conn->prepare("INSERT INTO products (seller_id, name, description, price, quantity, image) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("issdis", $_SESSION['seller_id'], $name, $description, $price, $quantity, $new_file_name);
            if ($stmt->execute()) {
                $success_msg = "Product added successfully!";
                // Clear form fields
                $name = $description = $price = $quantity = '';
            } else {
                $error_msg = "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $error_msg = "Prepare failed: " . $conn->error;
        }
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            width: 400px;
        }
        input, textarea {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
        }
        button {
            background: #28a745;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            cursor: pointer;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        .success {
            color: green;
            font-size: 1em;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Product</h2>
        <?php if (!empty($success_msg)) echo "<p class='success'>$success_msg</p>"; ?>
        <?php if (!empty($error_msg)) echo "<p class='error'>$error_msg</p>"; ?>
        <form method="post" enctype="multipart/form-data">
            <label>Product Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required />
            <span class="error"><?php echo $name_err; ?></span>

            <label>Description:</label>
            <textarea name="description" required><?php echo htmlspecialchars($description); ?></textarea>
            <span class="error"><?php echo $description_err; ?></span>

            <label>Price ($):</label>
            <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($price); ?>" required />
            <span class="error"><?php echo $price_err; ?></span>

            <label>Quantity:</label>
            <input type="number" name="quantity" value="<?php echo htmlspecialchars($quantity); ?>" required />
            <span class="error"><?php echo $quantity_err; ?></span>

            <label>Product Image:</label>
            <input type="file" name="image" accept="image/*" required />
            <span class="error"><?php echo $image_err; ?></span>

            <button type="submit">Add Product</button>
        </form>
    </div>
</body>
</html>
