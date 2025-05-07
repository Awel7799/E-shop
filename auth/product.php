<?php
$servername = "localhost";
$username = "root";
$password = "bUZweTz8ms_V&w/"; // your password
$dbname = "eshop";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<?php
// Fetch all products
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

// Check if there are any rows
if ($result->num_rows > 0) {
    // Loop through each row
    while($row = $result->fetch_assoc()) {
        // Access each column using $row['column_name']
        echo "<div style='border:1px solid #ccc; margin:10px; padding:10px;'>";
        echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
        echo "<p>Price: $" . htmlspecialchars($row['price']) . "</p>";

        // Display image stored as BLOB
        echo "<img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "' style='width:200px; height:auto;'>";

        echo "</div>";
    }
} else {
    echo "No products found.";
}
$conn->close();
?>
