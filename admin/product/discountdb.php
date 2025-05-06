<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "bUZweTz8ms_V&w/";
$dbName = "eshop";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['productName']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $imageName = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
        $uniqueName = uniqid('IMG_', true) . '.' . $imageExt;
        $uploadPath = '../../storage/uploads/' . $uniqueName;

        if (move_uploaded_file($imageTmp, $uploadPath)) {
            $sql = "INSERT INTO discount (name, price, quantity, category, image, start_date, end_date) 
                    VALUES ('$name', '$price', '$quantity', '$category', '$uploadPath', '$start_date', '$end_date')";

            if (mysqli_query($conn, $sql)) {
                header("Location: product.php");
                exit();
            } else {
                echo "Error inserting data: " . mysqli_error($conn);
            }
        } else {
            echo "Image upload failed.";
        }
    } else {
        echo "Invalid image or upload error.";
    }
}

$conn->close();
?>
