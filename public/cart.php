<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cart</title>
  <link rel="stylesheet" href="cart.css">
</head>
<body>

  <h1 class="title">Your Shopping Cart</h1>

  <div class="cart-container">
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
          echo '<img src="../storage/uploads/' . htmlspecialchars($row["product_image"]) . '" alt="Product Image">';
          echo '<div class="card-content">';
          echo '<h2>' . htmlspecialchars($row["product_name"]) . '</h2>';
          echo '<p>Price: $' . htmlspecialchars($row["product_price"]) . '</p>';
          echo '<p>Quantity: ' . htmlspecialchars($row["quantity"]) . '</p>';
          echo '<button onclick="deleteFromCart(' . $row["id"] . ')">Delete</button>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo '<p class="empty-message">Your cart is empty.</p>';
      }

      $conn->close();
    ?>
  </div>
  <script>
function deleteFromCart(id) {
  if (confirm("Are you sure you want to delete this item from the cart?")) {
    fetch("delete_from_cart.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "id=" + encodeURIComponent(id)
    })
    .then(response => response.text())
    .then(data => {
      alert(data);
      location.reload(); // reload the page to update the cart
    });
  }
}
</script>

</body>
</html>
