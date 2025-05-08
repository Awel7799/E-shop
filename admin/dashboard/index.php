<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to login page if not logged in
    header("Location: ../../auth/login_page.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <div class="admin-dashboard">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h2>Admin</h2>
      <nav>
        <a href="#">Dashboard</a> <br><br><br>
        <a href="../userMngmt/user.php">seller</a> <br><br><br>
        <a href="../product/product.php">Products</a> <br><br><br>
        <a href="../ordereditem/order.php">Orders</a> <br><br><br>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <!-- Overview Cards -->
      <section class="overview">
        <div class="card">Total sellers: <?php 
        $conn = new mysqli("localhost", "root", "bUZweTz8ms_V&w/", "eshop");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT COUNT(*) as total FROM sellers";
        $result = $conn->query($sql);

        if ($result && $row = $result->fetch_assoc()) {
            echo $row['total'];
        } else {
            echo "0";
        }

        $conn->close();
    ?></div>
        <div class="card">Products:  <?php 
        $conn = new mysqli("localhost", "root", "bUZweTz8ms_V&w/", "eshop");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT COUNT(*) as total FROM products";
        $result = $conn->query($sql);

        if ($result && $row = $result->fetch_assoc()) {
            echo $row['total'];
        } else {
            echo "0";
        }

        $conn->close();
    ?></div>
        
        <div class="card">Orders:  <?php 
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
    ?></div>
    <a href="../../auth/logout.php">Logout</a>
    <a href="../../public/index.php">back to home</a>

      </section>

      <!-- Table View -->
      <section class="table-section">
        <h3>Product List</h3>
        <table>
          <thead>
            <tr>
              <th>Product</th>
              <th>Seller</th>
              <th>Price</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>iPhone 15</td>
              <td>TechStore</td>
              <td>$999</td>
              <td>Approved</td>
              <td><button class="glow-button">Remove</button></td>
            </tr>
            <tr>
              <td>Adidas Sneakers</td>
              <td>FashionHub</td>
              <td>$120</td>
              <td>Pending</td>
              <td><button class="glow-button">Approve</button></td>
            </tr>
          </tbody>
        </table>
      </section>
    </main>
  </div>
</body>
</html>
