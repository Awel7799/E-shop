<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard - Orders</title>
  <link rel="stylesheet" href="order.css">
</head>
<body>

  <div class="order-section">

    <div class="order-header">
      <button class="back-btn"><a href="../dashboard/index.php">BACK</a></button>
      <h2>Orders</h2>
      <div class="order-count">
    Total Orders: <span>
    <?php 
        $conn = new mysqli("localhost", "root", "bUZweTz8ms_V&w/", "eshop");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT COUNT(*) as total FROM cart";
        $result = $conn->query($sql);

        if ($result && $row = $result->fetch_assoc()) {
            echo $row['total'];
        } else {
            echo "0";
        }

        $conn->close();
    ?>
    </span>
</div>

    </div>

    <div class="order-cards">
     

    <?php
      $conn = new mysqli("localhost", "root", "bUZweTz8ms_V&w/", "eshop");

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM cart";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="cart-card">';
          echo '<img src="../../storage/uploads/' . htmlspecialchars($row["product_image"]) . '" alt="Product Image">';
          echo '<div class="card-content">';
          echo '<h2>' . htmlspecialchars($row["product_name"]) . '</h2>';
          echo '<p>Price: $' . htmlspecialchars($row["product_price"]) . '</p>';
          echo '<p>Quantity: ' . htmlspecialchars($row["quantity"]) . '</p>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo '<p class="empty-message">Your cart is empty.</p>';
      }

      $conn->close();
    ?>

      <!-- More order cards if needed -->
    </div>

  </div>

</body>
</html>
