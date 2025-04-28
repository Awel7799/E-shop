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
        <button class="glow-btn"> <a href="addproduct.php"></a> + Add Product</button>
      </div>

      <div class="product-cards">
        <div class="product-card">
          <img src="https://via.placeholder.com/100" alt="Product Image">
          <h3>Product Name</h3>
          <p class="price">$29.99</p>
          <button class="delete-btn">Delete</button>
        </div>

        <div class="product-card">
          <img src="https://via.placeholder.com/100" alt="Product Image">
          <h3>Product Name</h3>
          <p class="price">$49.99</p>
          <button class="delete-btn">Delete</button>
        </div>

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
