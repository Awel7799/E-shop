<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard - Products</title>
  <link rel="stylesheet" href="product.css">
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

    <!-- Featured Products Area -->
    <section class="section">
      <div class="section-header">
        <h2>Featured Products</h2>
        <button class="glow-btn">+ Add Featured Product</button>
      </div>

      <div class="product-cards">
        <div class="product-card">
          <img src="https://via.placeholder.com/100" alt="Featured Product">
          <h3>Featured Product</h3>
          <p class="price">$59.99</p>
          <button class="delete-btn">Remove from Featured</button>
        </div>

        <!-- More featured product cards -->
      </div>
    </section>

    <!-- Discount Management Area -->
    <section class="section">
      <div class="section-header">
        <h2>Discount Management</h2>
      </div>

      <div class="discount-actions">
        <button class="glow-btn">Apply Discount to Selected</button>
      </div>

      <div class="product-cards selectable">
        <div class="product-card selectable-card">
          <input type="checkbox" class="select-checkbox">
          <img src="https://via.placeholder.com/100" alt="Product">
          <h3>Product Name</h3>
          <p class="price">$19.99</p>
        </div>

        <div class="product-card selectable-card">
          <input type="checkbox" class="select-checkbox">
          <img src="https://via.placeholder.com/100" alt="Product">
          <h3>Product Name</h3>
          <p class="price">$39.99</p>
        </div>

        <!-- More products -->
      </div>

      <div class="discount-duration">
        <h3>Set Discount Duration</h3>
        <label>Start Date:</label>
        <input type="date">
        <label>End Date:</label>
        <input type="date">
      </div>

      <div class="current-discounts">
        <h3>Current Discounts</h3>
        <div class="product-cards">
          <div class="product-card">
            <img src="https://via.placeholder.com/100" alt="Discounted Product">
            <h3>Discounted Product</h3>
            <p class="price">$14.99 (Discounted)</p>
          </div>

          <!-- More discounted products -->
        </div>
      </div>

    </section>

  </div>

</body>
</html>
