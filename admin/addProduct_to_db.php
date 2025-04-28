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
// check if the form was submitted
// When the form is submitted
if (isset($_POST['submit'])){
  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    // get image the from the html form and store it on a variable
    $productImage = file_get_contents($_FILES['image']['tmp_name']);
     $productname= $_POST['productName'];
     $productprice= $_POST['price'];
   // Escape the data for safe insertion into SQL
    $productImage = $conn->real_escape_string($productImage);
    
       // Insert into database
       $sql = "INSERT INTO products (image,name , price) VALUES ('$productImage','$productname','$productprice')";
      
       if ($conn->query($sql) === TRUE) {
        echo "Image uploaded and saved in database successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
  } else {
    echo "No image uploaded or there was an error.";
}
}
$conn->close();
?>
