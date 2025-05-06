<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard - Products</title>
  <link rel="stylesheet" href="products.css">
</head>
<body>
  <div class="product-section">
    
    <!-- All Products Area -->
    <section class="section">
      <div class="section-header">
        <h2>All Products</h2>
        <button class="glow-btn"> <a href="addproduct.php"> + Add Product</a></button>
      </div>

      <div class="product-cards">
      <?php
         $servername = "localhost";     
         $dbUsername = "root";           
         $dbPassword = "bUZweTz8ms_V&w/";              
         $dbName = "eshop"; 

        // Create connection
         $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

        // Check connection
       if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
           }
      // Fetch products
      $sql = "SELECT * FROM products";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="product-card">';
          echo '<img src="' . htmlspecialchars($row["image"]) . '" alt="Product Image">';
          echo '<h3>' . htmlspecialchars($row["name"]) . '</h3>';
          echo '<p class="price">$' . htmlspecialchars($row["price"]) . '</p>';
          echo '<a href="delete.php?product_id=' . $row["product_id"] . '" onclick="return confirm(\'Are you sure you want to delete this product?\')" class="delete-btn">Delete</a>';

          echo '</div>';
        }
      } else {
        echo '<p>No products found.</p>';
      }

      $conn->close();
    ?>

        <!-- More product cards -->
      </div>
    </section>

    
    <section class="section">
      <div class="section-header">
        <h2>Featured Products </h2>
        <button class="glow-btn"><a href="featuredProductpage.php"> + Add Featured Product</a></button>
      </div>

      <div class="product-cards">
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
      // Fetch products
      $sql = "SELECT * FROM featuredProduct";
      $result = $conn->query($sql);
    
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="product-card">';
          echo '<img src="' . htmlspecialchars($row["image"]) . '" alt="Product Image">';
          echo '<h3>' . htmlspecialchars($row["name"]) . '</h3>';
          echo '<p class="price">$' . htmlspecialchars($row["price"]) . '</p>';
          echo '<a href="deleteFeaturedproduct.php?id=' . $row["id"] . '" onclick="return confirm(\'Are you sure you want to delete this product?\')" class="delete-btn">Delete</a>';

          echo '</div>';
        }
      } else {
        echo '<p>No products found.</p>';
      }

      $conn->close();
    ?>

        <!-- More featured product cards -->
      </div>
    </section>

    <!-- Discount Management Area -->
    <section class="section">
      <div class="section-header">
        <h2>discounted products</h2>
        <button class="glow-btn"><a href="adddiscountpage.php"> + Add discounted Product</a></button>
      </div>

      <div class="product-cards">
      <?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "bUZweTz8ms_V&w/";
$dbName = "eshop";

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch discounted products
$sql = "SELECT * FROM discount ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo '<div class="product-card">';
    echo '<img src="' . htmlspecialchars($row["image"]) . '" alt="Product Image">';
    echo '<h3>' . htmlspecialchars($row["name"]) . '</h3>';
    echo '<p class="price">$' . htmlspecialchars($row["price"]) . '</p>';
    echo '<p class="discount-dates">From: ' . htmlspecialchars($row["start_date"]) . '<br>To: ' . htmlspecialchars($row["end_date"]) . '</p>';
    echo '<a href="discount_delete.php?id=' . $row["id"] . '" onclick="return confirm(\'Are you sure you want to delete this product?\')" class="delete-btn">Delete</a>';
    echo '</div>';
  }
} else {
  echo '<p>No products found.</p>';
}

$conn->close();
?>

        
      </div>
    </section>

  </div>

</body>
</html>
